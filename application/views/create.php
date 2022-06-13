<?php
	$user_id   		= isset($data["user_id"]) ? $data["user_id"] : "";
	$name       	= isset($data["user_full_name"]) ? $data["user_full_name"] : "";
	$username   	= isset($data["user_name"]) ? $data["user_name"] : "";
	$email      	= isset($data["user_email"]) ? $data["user_email"] : "";
	$password   	= isset($data["user_password"]) ? $data["user_password"] : "";
	$role_id        = isset($data['role_id']) ? $data['role_id'] : "";
	$role_name      = isset($data['role_name']) ? $data['role_name'] : "";
	$nik 		    = isset($data['user_nik']) ? $data['user_nik'] : "";

    $btn_msg 		= ($user_id == 0) ? "Create" : " Update";
    $title_msg 		= ($user_id == 0) ? "Create" : " Update";

    $level = $this->session->userdata("level");
?>
<!-- MAIN CONTENT -->
<div id="content">
    <div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<h1 class="page-title txt-color-blueDark"><?= $title_page ?> Development Only</h1>
		</div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 col-lg-offset-1 text-right">
			<h1>
                <a class="btn btn-warning back-button" href="<?= site_url() ?>" title="Back" rel="tooltip" data-placement="left" data-original-title="Batal">
					<i class="fa fa-arrow-circle-left fa-lg"></i>
				</a>
				<button class="btn btn-primary submit-form" data-form-target="log-form" title="Simpan" rel="tooltip" data-placement="top" >
					<i class="fa fa-floppy-o fa-lg"></i>
				</button>
			</h1>
		</div>
	</div>

    <!-- widget grid -->
    <section id="widget-grid" class="">
        <div class="row">
            <!-- NEW WIDGET ROW START -->
            <article class="col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-0"
                data-widget-editbutton="false"
                data-widget-deletebutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-pencil-square-o"></i> </span>
                        <h2><?= $title_msg ?> log</h2>

                    </header>
                    <!-- widget div-->
                    <div>
                        <form class="smart-form" id="log-form" action="<?= site_url('change_log/process_form'); ?>" method="post">
                            <input type="hidden" name="id" value="" />
                            <fieldset>
                                <section>
                                    <label class="label">Log Name <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="logname" value="" placeholder="Log Name">
                                    </label>
	                            </section>

	                            <section>
                                    <label class="label">Log Version <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="logversion" value="" placeholder="Log Version">
                                    </label>
	                            </section>

	                            <section>
                                    <label class="label">Log Author <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="logaut" value="" placeholder="Log Author">
                                    </label>
	                            </section>

	                            <section>
                                    <label class="label">Log Description<sup class="color-red">*</sup></label>
                                    <label class="textarea">
                                        <textarea name="logdesc" rows="20" cols="170"></textarea>
                                    </label>
	                            </section>

                            </fieldset>
                        </form>
                    </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </article>
        </div>
    </section> <!-- end widget grid -->
</div> <!-- END MAIN CONTENT -->
