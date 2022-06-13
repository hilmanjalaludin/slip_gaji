<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DETAIL SLIP</title>
    <!-- <link href='https://fonts.googleapis.com/css?family=Actor' rel='stylesheet'> -->
    <style>
        @page {
            size: 215mm 140mm potrait;
        }
        @font-face {
            font-family:"1979 Dot Matrix Regular";
            src:url("../../assets/printer/1979_dot_matrix.eot?") format("eot"),url("../../assets/printer/1979_dot_matrix.woff") format("woff"),url("../../assets/printer/1979_dot_matrix.ttf") format("truetype"),url("../../assets/printer/1979_dot_matrix.svg#1979-Dot-Matrix") format("svg");
            font-weight:normal;
            font-style:normal;
        }


        body, h1, h2, h3, h4, h5, h6 {
            font-family: "1979 Dot Matrix Regular";
            font-size: 3mm;
            margin: 0mm;
            padding: 0mm;
            line-height: 4mm;
        }
        .page {
            /*width: 210mm;
            height: 148mm;*/
            position: fixed;
            background: none;
            border: none;
        }
        p {
            margin: 0 0 1mm 0;
            background-color: none;
        }
        div {
            background-color: none;
            /*#f7f7f7;*/
        }
        .title { 
            font-weight: bold;
        }
        .list-product {
            height: 62mm;
            overflow: hidden;
            border-top: 0.5mm solid black;
            border-bottom: 0.5mm solid black;
        }
        .list-product p {
            margin: 0;
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            padding:1mm 3mm 0.5mm 0mm;
            border:none;
        }
        .table>thead {
            text-align: left;
        }
        .table>tbody>tr>td:last-child, .table>tbody>tr>th:last-child,.table>thead>tr>td:last-child, .table>thead>tr>th:last-child {
            padding-right: 0mm;
        }

        #background{
            position:absolute;
            z-index:0;
            background:white;
            margin-left: 10%;
            display:block;
            min-height:50%; 
            min-width:50%;
            color:yellow;
        }

        #bg-text
        {
            font-family: 'Actor';
            color:lightgrey;
            font-size:120px;
            transform:rotate(300deg);
            -webkit-transform:rotate(300deg);
        }
    </style>
    <script src="<?= base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>
</head>

<body onload="onbeforeunload()">
    <!-- <div id="background">
        <p id="bg-text">BNI</p>
    </div> -->
    <div class="page">
        <div style="position: fixed;margin-top: 4mm;margin-left: 4mm;">
            <h2>SLIP GAJI</h2>
        </div>
        <div style="position: fixed;margin-top: 12mm;margin-left: 4mm;">
            <p style="max-width:90mm;">
            	Setiabudi Building II, Lt. 6 <br>				
				Jl. HR. Rasuna Said. Kav. 62. Jakarta Selatan</p>
        </div>
        <div style="position: fixed;margin-top: 12mm;margin-left: 110mm;">
            <table>
                    <tr>
                        <td>AOC</td>
                        <td>:</td>
                        <td> <?= $data_print['code']; ?> </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $data_print['name']; ?> </td>
                    </tr>
                    <tr>
                        <td>Team</td>
                        <td>:</td>
                        <td><?= ($data_print['team']) ? $data_print['team'] : 0; ?></td>
                    </tr>
                    <tr>
                        <td>Posisi</td>
                        <td>:</td>
                        <td><?= $data_print['position']; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td><?= $data_print['status']; ?>   </td>
                    </tr>
                </table>
        </div>
        <div style="position: fixed;margin-top: 34mm;margin-left: 4mm;width: 75mm;overflow: hidden;height: 14mm;">
            <p class="title" style="height: 4mm;width: 75mm;overflow: hidden;">
                <span style="width: 25mm;display: inline-block;"><?= date('m/d/Y', strtotime($data_print['periode_date'])) ?></span>
            </p>
        </div>
        <div style="position: fixed;margin-top: 44mm;margin-left: 68mm;width: 54mm;height: 4mm;overflow: hidden;">
        </div>
        <div style="width: 500mm;">
	        <div style="position: fixed;margin-top: 44mm;margin-left: 4mm;width: 180mm;height: 4mm;overflow: hidden; border-bottom: 0.5mm solid black; border-top:0.5mm solid black; ">
		        PENERIMAAN
	        </div>
	        <div style="position: fixed;margin-top: 44mm;margin-left: 105mm;width: 71mm;height: 4mm;overflow: hidden;">
	            POTONGAN
	        </div>
        </div>
       
        <!-- tanda tangan -->
        <div style="position: fixed;margin-top: 114mm; margin-left: 80mm;">
            <div style="position: relative;margin-left: 0mm;background:none;float: left;">
                <p style="text-align: center;width: 100%;">
                    Diserahkan oleh,
                </p>
                <p style="height: 16mm;">
                </p>
                <p style="text-align: center;width: 100%;height: 4mm;">
                    ( ADMIN HRD )
                </p>
            </div>
        </div>

         <div style="position: fixed;margin-top: 114mm; margin-left: 120mm;">
            <div style="position: relative;margin-left: 0mm;background:none;">
		    	<p>Jakarta, &nbsp;<?= tgl_indo('Y-m-15'); ?></p>
                <p style="text-align: center;width: 100%;">
                    Diterima oleh,
                </p>
                <p style="height: 11mm;">
                </p>
                <p style="text-align: center;width: 100%;height: 4mm;">
                    ( <?= $this->session->userdata('name'); ?> )
                </p>
            </div>
        </div>
        <!-- tampung data ke variabel biar gampang -->
        <?php 
            $level = $this->session->userdata('user_id');
        	// PENERIMAAN
            $gaji_pokok    		= ( $data_print['basic_sallary']) ? ($data_print['basic_sallary']) : "0";
            $allowance 	   		= ($data_print['tunjangan_jabatan']) ? ($data_print['tunjangan_jabatan']) : "0"; 
            $ot 		   		= ($data_print['over_time']) ? ($data_print['over_time']) : "0";
            $transport 	   		= ($data_print['commision_taxi']) ? ($data_print['commision_taxi']) : "0";
            $gaji_repelan  		= ($data_print['rapelan_jan_mar']) ? ($data_print['rapelan_jan_mar']) : "0";
            $rapelan_ot    		= ($data_print['rapelan_ot_jan_mar']) ? ($data_print['rapelan_ot_jan_mar']) : "0";
            $reward        		= ($data_print['reward']) ? ($data_print['reward']) : "0";
            $bpjs_pensiun  		= ($data_print['bpjs_pensiun_1']) ? ($data_print['bpjs_pensiun_1']) : "0";
            $komisi 	   		= ($data_print['commision']) ? ($data_print['commision']) : "0";
            $total_gaji_bruto 	= ($data_print['total_gaji_bruto']) ? ($data_print['total_gaji_bruto']) : "0";

            //PEMOTONGAN
            $bpjs_kesehatan     = ($data_print['bpjs_kesehatan_2']) ? ($data_print['bpjs_kesehatan_2']) : "0";
            $bpjs_pensiun   	= ($data_print['bpjs_pensiun_2']) ? ($data_print['bpjs_pensiun_2']) : "0";
            $bpjs_tenaga_kerja  = ($data_print['bpjs_tenaga_kerja_2']) ? ($data_print['bpjs_tenaga_kerja_2']) : "0";
            $pph21				= ($data_print['pph_pasal_21']) ? ($data_print['pph_pasal_21']) : "0";
            $potongan_parkir    = ($data_print['potongan_parkir']) ? ($data_print['potongan_parkir']) : "0";
            $potongan_outing    = ($data_print['potongan_outing']) ? ($data_print['potongan_outing']) : "0";
            $thp = ($data_print['thp']) ? ($data_print['thp']) : '0';

            $total_potongan = 
	            (
	            	$bpjs_kesehatan +
	            	$bpjs_pensiun   +
	            	$bpjs_tenaga_kerja +
	            	$pph21   +
	            	$potongan_parkir + 
                    $potongan_outing
	            );
            $total_diterima = ($total_gaji_bruto) - ( $total_potongan );

        ?>
        <!-- fix ok -->
        <div style="position: fixed;margin-top: 50mm; margin-left: 4mm;width: 199.4mm; display: inline-block;">
            <!-- <div class="list-product"> -->
            <table width="100%" class="table">
            	<tr>
	                <td>Gaji Pokok <span style="margin-left: 15.8mm;"></span>:&nbsp;&nbsp;<?= number_format($gaji_pokok); ?></td>
	                <td></td>
	                <td>BPJS Kesehatan <span style="margin-left: 13.5mm;"></span>: <?= number_format($bpjs_kesehatan); ?></td>
            	</tr>
            	<tr>
	                <td colspan="1">Allowance<span style="margin-left: 18.7mm;"></span>:&nbsp;&nbsp;<?= number_format($allowance) ?></td>
	                <td></td>
	                <td>BPJS Pensiun <span style="margin-left: 18.8mm;"></span>: <?= number_format($bpjs_pensiun); ?></td>
            	</tr>
            	<tr>
	                <td colspan="1">Over Time<span style="margin-left: 19.8mm;"></span>:&nbsp;&nbsp;<?= number_format($ot) ?></td>
	                <td></td>
	                <td>BPJS Ketenagakerjaan <span style="margin-left: ;"></span>: <?= number_format($bpjs_tenaga_kerja); ?></td>
            	</tr>
            	<tr>
	                <td colspan="1">Transport <span style="margin-left: 16.8mm;"></span>:&nbsp;&nbsp;<?= number_format($transport); ?></td>
	                <td></td>
	                <td>PPH Pasal 21 <span style="margin-left: 19.2mm;"></span>: <?= number_format($pph21) ?></td>
            	</tr>
            	<tr>
	                <td colspan="1">Komisi <span style="margin-left: 25.1mm;"></span>:&nbsp;&nbsp;<?= number_format($komisi); ?></td>
	                <td></td>
	                <td>Potongan Parkir <span style="margin-left: 12mm;"></span>: <?= number_format($potongan_parkir); ?></td>
            	</tr>
            	<tr>
	                <td colspan="1">Rapelan Gaji<span style="margin-left: 13.1mm;"></span>:&nbsp;&nbsp;<?= number_format($gaji_repelan); ?></td>
	                <td></td>
	                <td>Potongan Outing <span style="margin-left: 12mm;"></span>: <?= number_format($potongan_outing); ?></td>
            	</tr>
            	<tr>
	                <td colspan="1">Rapelan OT<span style="margin-left: 16.9mm;"></span>:&nbsp;&nbsp;<?= number_format($rapelan_ot); ?></td>
	                <td></td>
	                <td></td>
            	</tr>
            	<tr>
	                <td colspan="1">Reward<span style="margin-left: 25.3mm;"></span>:&nbsp;&nbsp;<?= number_format($reward); ?> </td>
	                <td></td>
	                <td></td>
            	</tr>
            	<tr>
            		<td colspan="1"></td>
            		<td></td>
            		<td></td>
            	</tr>
            	<tr>
	                <td colspan="1">Total Gaji Bruto <span style="margin-left: 1mm;">&nbsp;:&nbsp;<?= number_format($total_gaji_bruto); ?></td>
	                <td></td>
	                <td>Total Potongan <span style="margin-left: 13.7mm;"></span>: <?= number_format($total_potongan) ?></td>
            	</tr>
            </table>
            <div style="width: 500mm;">
                <div style="position: fixed;margin-left:1mm;width: 177mm;height: 4mm;overflow: hidden; border-bottom: 0.5mm solid black; border-top:0.5mm solid black; ">
                    Total gaji yang diterima
                </div>
                <div style="position: fixed;margin-left: 101.2mm;width: 71mm;height: 4mm;overflow: hidden;">
                    RP <span style="margin-left: 28mm;">&nbsp;&nbsp;: <?= number_format($thp); ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
