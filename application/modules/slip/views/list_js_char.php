<script type="text/javascript">
	function b64_to_utf8( str ) {
	    str = str.replace(/\s/g, '');    
	    return decodeURIComponent(escape(window.atob( str )));
	}

	/**
	* format rupiah
	* ref : https://www.malasngoding.com/membuat-format-rupiah-dengan-javascript/
	* 
	*/
	function formatRupiah(angka, prefix){
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split   		= number_string.split(','),
		sisa     		= split[0].length % 3,
		rupiah     		= split[0].substr(0, sisa),
		ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
	 
		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if(ribuan){
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
	 
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}

	/**
	 * This js file is used in multiple places.
	 * it provides password confirmation alert.
	 */
	var lists = function () {
	    var table_id     = "#dataTable";
	    var role_session = "<?= $this->session->userdata('level'); ?>";
	    var ajax_source  = "<?= site_url('slip/list_all_data_char') ?>";
	    var url 		 = "<?= site_url('slip/'); ?>";

	    var columns = [
	        {"data": "upload_id" },
	        {"data": "nik" },
	        {"data": "name" },
	        {"data": "basic_sallary" ,
	        	"render" : function(data, type, full) {
	        		if( data != null ) {
	        			return formatRupiah(data);
	        		}
	        		return "";
	        	}
	    	},
	        {"data": "periode_date",
	            "render":function(data, type, full) {
	                if (data != null && data != "") {
	                    return moment(data).format("DD MMMM YYYY");
	                }

	                return "";
	            }
	        },
	        {
	            "title": "Action",
	            "class": "text-center",
	            "data": null,
	            "sortable": false,
	            "render": function(data, type, full) {
	                var edit =  '<td>';
	                    edit +=  ' <a href="' + url + "preview-print-char/" +full.upload_id + '" class="btn btn-info btn-circle print-slip" rel="tooltip" title="Print Slip" data-placement="top" data-validate="' + data.upload_id + '"><i class="fa fa-print"></i></a>';
	                    edit +=  ' <a href="' + url + "detail-print-char/" +full.upload_id + '" class="btn btn-warning btn-circle detail" target="_blank" rel="tooltip" title="View Detail Slip" data-placement="top" data-validate="' + data.upload_id + '"><i class="fa fa-eye"></i></a>&nbsp;'; 
	                    if( role_session == "ADMINISTRATOR" || role_session == "SYSTEM") {
							edit += '<a href="'+ url +'delete_char" data-id ="' + full.upload_id + '" data-name ="' + full.name + '" class="btn btn-danger btn-circle delete-confirm" rel="tooltip" title="Delete Slip" data-placement="top" ><i class="fa fa-trash-o"></i></a>';
						}                             
	                    edit +=  '</td>';

	                return edit;
	            }
	        },
	    ];
	    setup_daterangepicker(".date-range-picker");
	    init_datatables (table_id, ajax_source, columns);

	    $(document).on("click", ".delete-confirm", function(e) {
	        e.stopPropagation();
	        e.preventDefault();
	        var url = $(this).attr("href");
	        var data_id = $(this).data("id");
	        var data_name = $(this).data("name");

	        title = 'Delete Confirmation';
	        content = 'Do you really want to delete ' + data_name + ' ?';

	        popup_confirm (url, data_id, title, content);

	    });

	    $(document).on("popup-confirm:success", function (e, url, data_id){
	        $("#dataTable").dataTable().fnClearTable();
	    });
	};

	/**
	 * This js file is used in multiple places.
	 * it provides password confirmation alert.
	 */
	function showPasswordConfirm(onSuccess) {
	    swal({
	        title: "Verifikasi User",
	        text: "Silahkan masukan password anda.",
	        type: "warning",
	        showCancelButton: true,
	        cancelButtonText: "Batal",
	        confirmButtonText: "Verifikasi",
	        animation: true,
	        input: 'password',
	        inputAttributes: {
	            'autocomplete': 'off',
	            'autocapitalize': 'off',
	            'autocorrect': 'off'
	        },
	        inputValidator: function(value) {
	            return new Promise(function(resolve, reject) {
	                if (value) {
	                    resolve();
	                } else {
	                    reject('Tolong masukan password Anda.');
	                }
	            });
	        }
	    }).then(function(pass) {
	        onSuccess(pass);
	    }).catch(swal.noop);
	}

	var listenToPrintWithConfirmation = function() {
	    $(document).on('click', '.print-slip', function(event) {
	        var button = $(this);
	        event.preventDefault();
	        event.stopPropagation();

	        var should_validate = $(this).data('validate');
	        if (should_validate) {
	            //get password first.
	            showPasswordConfirm(function(pass) {
	                //show loading.
	                $('.loading').css("display", "block");

	                var url = "<?= site_url("slip/check_password"); ?>";
	                //ajax post.
	                $.ajax({
	                    type: "post",
	                    url: url,
	                    cache: false,
	                    data: {
	                        password: pass,
	                    },
	                    dataType: 'json',
	                    success: function(data) {
	                        //stop loading.
	                        $('.loading').css("display", "none");

	                        if (data.error_msg) {
	                            swal("Oops!", data['error_msg'], "error");
	                        } else {
	                            //print this.
	                            $(button).printPage({showMessage:false}, "fire!");

	                            //refresh table!.
	                            $("#dataTable").dataTable().fnClearTable();
	                        }
	                    },
	                    error: function() {
	                        console.log("error");

	                        //stop loading.
	                        $('.loading').css("display", "none");
	                    }
	                });
	            });
	        } else {
	            //nope? then print it.
	            $(button).printPage({showMessage:false}, "fire!");

	            //refresh table!.
	            $("#dataTable").dataTable().fnClearTable();
	        }
	    });
	}

	var listendDetail = function() {
	    $(document).on('click', '.detail', function(event) {
	        var button = $(this);
	        event.preventDefault();
	        event.stopPropagation();

	        var should_validate = $(this).data('validate');
	        if (should_validate) {
	            //get password first.
	            showPasswordConfirm(function(pass) {
	                //show loading.
	                $('.loading').css("display", "block");

	                var url = "<?= site_url("slip/check_password_detail"); ?>";
	                //ajax post.
	                $.ajax({
	                    type: "post",
	                    url: url,
	                    cache: false,
	                    data: {
	                        password: pass,
	                    },
	                    dataType: 'json',
	                    success: function(data) {
	                        //stop loading.
	                        $('.loading').css("display", "none");
	                        console.log(data);
	                        window.open("<?= site_url('slip/detail-print-char/'); ?>"+ should_validate);
	                       // location.href = 
	                    },
	                    error: function() {
	                        console.log("error");

	                        //stop loading.
	                        $('.loading').css("display", "none");
	                    }
	                });
	            });
	        } else {
	            //nope? then print it.
	            $(button).printPage({showMessage:false}, "fire!");

	            //refresh table!.
	            $("#dataTable").dataTable().fnClearTable();
	        }
	    });
	}

	$(document).ready(function() {
	    lists();
	    listendDetail();
	    listenToPrintWithConfirmation();
	});

</script>