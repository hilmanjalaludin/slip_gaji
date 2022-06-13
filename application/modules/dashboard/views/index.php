<!-- MAIN CONTENT -->
<div id="content">

	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<h1 class="page-title txt-color-blueDark"><?= $title_page ?></h1>
		</div>
	</div>
</div>

<?php 
	$level = $this->session->userdata('level');

	if( $level == "ADMINISTRATOR" || $level == "SYSTEM") :
?>
	<!-- <div class="col-md-3 col-sm-4">
		<div class="wrimagecard wrimagecard-topimage">
			<a href="#">
				<div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
					<center><i class="fa fa-area-chart" style="color:#BB7824"></i></center>
				</div>
				<div class="wrimagecard-topimage_title">
					<h4>Total Data Upload AKS
						<div class="pull-right badge"><?php //echo $data_aks['total'] ?></div>
					</h4>
				</div>
			</a>
		</div>
	</div>

	<div class="col-md-3 col-sm-4">
		<div class="wrimagecard wrimagecard-topimage">
			<a href="#">
				<div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
					<center><i class = "fa fa-area-chart" style="color:#16A085"></i></center>
				</div>
				<div class="wrimagecard-topimage_title">
					<h4>Total Data Upload HSBC
						<div class="pull-right badge" id="WrControls"><?php //echo $data_hsbc['total']; ?></div>
					</h4>
				</div>
			</a>
		</div>
	</div> -->
	
	<?php else : ?>
		<?php 
			$this->load->model("Dynamic_model");

			$log = $this->Dynamic_model->set_model("tbl_change_log")->get_all_data(array(
				"order_by"  => array("log_id" => "desc"),
				"row_array" => true
			))['datas'];
		?>
		<div class="col-md-8" style="margin-top: 10px;">
			<div class="alert alert-success fade in">
				<button class="close" data-dismiss="alert">
					×
				</button>
				<i class="fa-fw fa fa-check"></i>
				<strong><?php echo greeting(); ?></strong> <b><?= $this->session->userdata('name');?></b>  selamat datang di sistem informasi slip gaji V <?= $log['log_curr_version']; ?>
			</div>
		</div>

	<?php endif;?>