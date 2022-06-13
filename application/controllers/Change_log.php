<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_log extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('change_log_version');	
	}

	/**
     * Create an admin
     */
    public function create () 
    {
        // $this->_breadcrumb .= '<li><a href="/user">User</a></li>';

        //load model
        $this->load->model("Dynamic_model");

        //prepare header title.
        $header = array(
            "title"         => "Update Change Log",
            "title_page"    => '<span>> Change Log</span>',
            "breadcrumb"    => '<li>Change Log</li>',
            // "back"          => $this->_back,
        );

        $footer = array(
            "view_js_nav" => "log_js"
        );

        //load the view.
        $this->load->view(MANAGER_HEADER, $header);
        $this->load->view('create');
        $this->load->view(MANAGER_FOOTER, $footer);
    }

    /**
     * Method to process adding or editing via ajax post.
     */
    public function process_form() 
    {
        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
			exit('No direct script access allowed');
		}

        //load form validation lib.
        $this->load->library('form_validation');

        //load the model.
        $this->load->model('Dynamic_model');

        //initial.
        $message['alert_error'] = true;
		$message['error_msg'] = "";
        $message['redirect_to'] = "";

        //sanitize input (id is primary key, if from edit, it has value).
        $id            = $this->input->post('id');
        $log_name      = $this->input->post('logname');
        $log_vers      = $this->input->post('logversion');
        $log_auth      = $this->input->post('logaut');
        $log_desc      = $this->input->post('logdesc');

        //server side validation.

        //begin transaction.
        $this->db->trans_begin();

        //validation success, prepare array to DB.
        $_save_data = array(
            'log_name' => $log_name,
            'log_curr_version' => $log_vers,
            'log_desc' => $log_desc,
            'log_user_create' => $log_auth,
            'log_date' => date('Y-m-d H:i:s')
        );

        //insert or update?
        if ($id == "") {
            //insert to DB.
            //set default user role by system

            //then insert
            $result = $this->Dynamic_model->set_model('tbl_change_log','tcl','log_id')->insert($_save_data);

            //end transaction.
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $message['error_msg'] = 'database operation failed.';

            } else {
                $this->db->trans_commit();

                $message['alert_error'] = false;
                //success.
                //growler.
                $message['notif_title']     = "Good!";
                $message['notif_message']   = "log success.";
                //on insert, not redirected.
                $message['redirect_to']     = site_url("dashboard");
            }
        } else {
            //update.
            $_save_data['user_password']     = sha1($password);
            $_save_data['user_created_date'] = $date_now;
            //condition for update.
            $condition = array("user_id" => $id);
            $result = $this->Admin_model->update($_save_data, $condition);

            //end transaction.
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $message['error_msg'] = 'database operation failed.';

            } 
            else {

                $this->db->trans_commit();
                //check if admin id equals to current user login
                //re-set session
                $message['is_error'] = false;
                //success.
                //growler.
                $message['notif_title'] = "Excellent!";
                $message['notif_message'] = "Admin has been updated.";

                //on update, redirect.
                $message['redirect_to'] = "/admin";
           }
        }
        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }
}

/* End of file change_log.php */
/* Location: ./application/controllers/change_log.php */