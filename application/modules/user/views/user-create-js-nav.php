<script>
	var create = function (){
    //init validate form org
    var create_form = "#user-form";
    var create_rules = {
        fullname: {
            required: true,
        },
        username: {
            required: true,
            minlength: 3,
            maxlength: 100,
        },
        user_role: {
            required: true,
        },
        email: {
            required: true,
            email: true,
        },
        user_password: {
            required: true,
            minlength: 4,
            maxlength: 20,
        },
        conf_password: {
            required: true,
            minlength: 4,
            maxlength: 20,
            equalTo: "#password"
        },
        new_password: {
            minlength: 4,
            maxlength: 20,
        },
        conf_new_password: {
            minlength: 4,
            maxlength: 20,
            equalTo: "#new_password"
        },
    };

    init_validate_form (create_form,create_rules);
};

$(document).ready(function() {
    create();

    $('#role').change(function() {
        if ($(this).val() == 5 || $(this).val() == 4 || $(this).val() == 6) {
            $("#nik").show(); 
            $("#username").hide();
        } else {
            $("#username").show();
            $("#nik").hide();
        }
    });
});

</script>			