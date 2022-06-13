<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package Slip Controller
 * @author  Didi Triawan
 * @license http://it-underground.web.id/licenses/MIT  MIT License
 * @link    http://it-underground.web.id
 * @since   Version 1.0.1
 */
class Slip extends CI_Controller  {

    // set private table 
    private $_title         = "Slip";
    private $_title_page    = '<i class="fa-fw fa fa-user"></i> Slip ';
    private $_breadcrumb    = "<li><a href='".MANAGER_HOME."'>Home</a></li>";
    private $_active_page   = "slip";
    private $_back          = "/slip";
    private $_js_path       = "/js/pages/slip/";
    private $_view_folder   = "slip/";

    // ---- set private table --- //
    private $_table         = "tbl_upload";
    private $_table_aliases = "tu";
    private $_pk_field      = "upload_id";

    private $_tbl   = "tbl_upload_hsbc";
    private $_alias = "tuh";
    private $_id    = "upload_id";

    private $_tbl_bni   = "tbl_upload_bni";
    private $_alias_bni = "tub";
    private $_id_bni    = "upload_id";

    private $_tbl_dipo    = "tbl_upload_dipo";
    private $_alias_dipo  = "tud";
    private $_id_dipo     = "upload_id";

    private $_tbl_char    = "tbl_upload_char";
    private $_alias_char  = "tuc";
    private $_id_char     = "upload_id";
    //-- end set private table ----//

    /**
	 * constructor.
	 */
    public function __construct() {
        parent::__construct();

        if($this->session->userdata(IS_LOGIN_ADMIN) == FALSE ) {
            redirect('login');
            $this->session->sess_destroy();
        }
    }

    //////////////////////////////// VIEWS //////////////////////////////////////

    /**
     * List Admin
     */
    public function index() {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List</span>',
            "active_page"   => "slip-list",
            "breadcrumb"    => $this->_breadcrumb . '<li>SLIP</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
                "assets/js/jquery.PrintPage.js"
            ),
            "view_js_nav" =>
                $this->_view_folder."list_js_nav"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'index');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
     * List hsbc
     */
    public function list() {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List</span>',
            "active_page"   => "slip-hsbc-list",
            "breadcrumb"    => $this->_breadcrumb . '<li>SLIP</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
                "assets/js/jquery.PrintPage.js"
            ),
            "view_js_nav" =>
                $this->_view_folder."list_js_hsbc"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'list');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
     * List hsbc
     */
    public function list_bni() {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List</span>',
            "active_page"   => "slip-bni-list",
            "breadcrumb"    => $this->_breadcrumb . '<li>SLIP</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
                "assets/js/jquery.PrintPage.js"
            ),
            "view_js_nav" =>
                $this->_view_folder."list_js_bni"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'list-bni');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
     * List dipo
     */
    public function list_dipo() {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List</span>',
            "active_page"   => "slip-dipo-list",
            "breadcrumb"    => $this->_breadcrumb . '<li>SLIP</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
                "assets/js/jquery.PrintPage.js"
            ),
            "view_js_nav" =>
                $this->_view_folder."list_js_dipo"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'list-dipo');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
     * List char
     */
    public function list_char() {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List</span>',
            "active_page"   => "slip-char-list",
            "breadcrumb"    => $this->_breadcrumb . '<li>SLIP</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
                "assets/js/jquery.PrintPage.js"
            ),
            "view_js_nav" =>
                $this->_view_folder."list_js_char"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'list-char');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    ////////////////////////////// AJAX CALL ////////////////////////////////////
    /**
     * Function to get list_all_data staff
     */
    public function list_all_data() {
        //must ajax and must get.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "GET") {
			exit('No direct script access allowed');
		}

		//load model
        $this->load->model('Dynamic_model');

        //sanitize and get inputed data
        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
		$sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
		$limit    = sanitize_str_input($this->input->get("length"), "numeric");
		$start    = sanitize_str_input($this->input->get("start"), "numeric");
		$search   = sanitize_str_input($this->input->get("search")['value']);
        $filter   = $this->input->get("filter");

		$select = array(
            'upload_id',
            'nik',
            'name',
            'basic_sallary',
            'periode_date'
        );

        $joined = array("mst_user mu" =>array("mu.user_nik" => $this->_table_aliases.".nik"));

        $column_sort = $select[$sort_col];
        //get nik by user login
        $nik = $this->session->userdata("nik");
        //initialize.
        $data_filters   = array();
        $conditions     = array();

        $level = $this->session->userdata("level");
        $posisi = $this->session->userdata("posisi");
        $site = $this->session->userdata("site");

        if( $site == "INTERNAL" || $site == "STAFF") {
            $conditions = array("mu.user_nik" => $nik);
        }
        $status = STATUS_ALL;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'nik':
                        if ($value != "") {
                            $data_filters['lower(nik)'] = $value;
                        }
                        break;

                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(name)'] = $value;
                        }
                        break;
                    case 'periode_date':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(periode_date as date) <="] = $date['end'];
                            $conditions["cast(periode_date as date) >="] = $date['start'];

                        }
                        break;

                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model($this->_table, $this->_table_aliases, $this->_pk_field)->get_all_data(array(
			'select'             => $select,
            'left_joined'        => $joined,
            'order_by'           => array($column_sort => $sort_dir),
			'limit'              => $limit,
			'start'              => $start,
			'conditions'         => $conditions,
            'filter'             => $data_filters,
			'status'             => $status,
            "count_all_first"    => true,
            "debug"              => false
		));
        //get total rows
        $total_rows = $datas['total'];

        // $get_decode =
        $output = array(
            "data" => $datas['datas'],
			"draw" => intval($this->input->get("draw")),
			"recordsTotal" => $total_rows,
			"recordsFiltered" => $total_rows,
		);

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($output);
        exit;
    }

    ////////////////////////////// AJAX CALL ////////////////////////////////////
    /**
     * Function to get list_all_data hsbc
     */
    public function list_all_data_hsbc() {
        //must ajax and must get.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "GET") {
            exit('No direct script access allowed');
        }

        //load model
        $this->load->model('Dynamic_model');

        //sanitize and get inputed data
        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
        $sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
        $limit    = sanitize_str_input($this->input->get("length"), "numeric");
        $start    = sanitize_str_input($this->input->get("start"), "numeric");
        $search   = sanitize_str_input($this->input->get("search")['value']);
        $filter   = $this->input->get("filter");

        $select = array(
            'upload_id',
            'nik',
            'name',
            'basic_sallary',
            'periode_date'
        );

        $joined = array("mst_user mu" => array("mu.user_nik" => $this->_alias.".nik"));

        $column_sort = $select[$sort_col];
        //get nik by user login
        $nik = $this->session->userdata("nik");

        //initialize.
        $data_filters   = array();
        $conditions     = array();

        $level = $this->session->userdata("level");
        $posisi = $this->session->userdata("posisi");
        $site = $this->session->userdata("site");

        if( $site == "HSBC") {
            $conditions = array("mu.user_nik" => $nik);
        }

        $status = STATUS_ALL;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'nik':
                        if ($value != "") {
                            $data_filters['lower(nik)'] = $value;
                        }
                        break;

                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(name)'] = $value;
                        }
                        break;
                    case 'periode_date':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(periode_date as date) >="] = $date['start'];
                            $conditions["cast(periode_date as date) <="] = $date['end'];

                        }
                        break;

                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model($this->_tbl, $this->_alias, $this->_id)->get_all_data(array(
            'select'             => $select,
            'left_joined'        => $joined,
            'order_by'           => array($column_sort => $sort_dir),
            'limit'              => $limit,
            'start'              => $start,
            'conditions'         => $conditions,
            'filter'             => $data_filters,
            'status'             => $status,
            "count_all_first"    => true,
            "debug"              => false
        ));
        //get total rows
        $total_rows = $datas['total'];

        // $get_decode =
        $output = array(
            "data" => $datas['datas'],
            "draw" => intval($this->input->get("draw")),
            "recordsTotal" => $total_rows,
            "recordsFiltered" => $total_rows,
        );

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($output);
        exit;
    }

    ////////////////////////////// AJAX CALL ////////////////////////////////////
    /**
     * Function to get list_all_data hsbc
     */
    public function list_all_data_bni() {
        //must ajax and must get.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "GET") {
            exit('No direct script access allowed');
        }

        //load model
        $this->load->model('Dynamic_model');

        //sanitize and get inputed data
        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
        $sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
        $limit    = sanitize_str_input($this->input->get("length"), "numeric");
        $start    = sanitize_str_input($this->input->get("start"), "numeric");
        $search   = sanitize_str_input($this->input->get("search")['value']);
        $filter   = $this->input->get("filter");

        $select = array(
            'upload_id',
            'nik',
            'name',
            'basic_sallary',
            'periode_date'
        );

        $joined = array("mst_user mu" => array("mu.user_nik" => $this->_alias_bni.".nik"));

        $column_sort = $select[$sort_col];
        //get nik by user login
        $nik = $this->session->userdata("nik");
        //initialize.
        $data_filters   = array();
        $conditions     = array();

        $level = $this->session->userdata("level");
        $posisi = $this->session->userdata("posisi");
        $site = $this->session->userdata("site");

        if( $site == "BNI") {
            $conditions = array("mu.user_nik" => $nik);
        }
        $status = STATUS_ALL;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'nik':
                        if ($value != "") {
                            $data_filters['lower(mu.user_nik)'] = $value;
                        }
                        break;

                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(name)'] = $value;
                        }
                        break;
                    case 'periode_date':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(periode_date as date) >="] = $date['start'];
                            $conditions["cast(periode_date as date) <="] = $date['end'];

                        }
                        break;

                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model($this->_tbl_bni, $this->_alias_bni, $this->_id_bni)->get_all_data(array(
            'select'             => $select,
            'left_joined'        => $joined,
            'order_by'           => array($column_sort => $sort_dir),
            'limit'              => $limit,
            'start'              => $start,
            'conditions'         => $conditions,
            'filter'             => $data_filters,
            'status'             => $status,
            "count_all_first"    => true,
            "debug"              => false
        ));
        //get total rows
        $total_rows = $datas['total'];

        // $get_decode =
        $output = array(
            "data" => $datas['datas'],
            "draw" => intval($this->input->get("draw")),
            "recordsTotal" => $total_rows,
            "recordsFiltered" => $total_rows,
        );

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($output);
        exit;
    }

    ////////////////////////////// AJAX CALL ////////////////////////////////////
    /**
     * Function to get list_all_data hsbc
     */
    public function list_all_data_dipo() {
        //must ajax and must get.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "GET") {
            exit('No direct script access allowed');
        }

        //load model
        $this->load->model('Dynamic_model');

        //sanitize and get inputed data
        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
        $sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
        $limit    = sanitize_str_input($this->input->get("length"), "numeric");
        $start    = sanitize_str_input($this->input->get("start"), "numeric");
        $search   = sanitize_str_input($this->input->get("search")['value']);
        $filter   = $this->input->get("filter");

        $select = array(
            'upload_id',
            'nik',
            'name',
            'basic_sallary',
            // 'FROM_BASE64(SUBSTRING(basic_sallary,1,12)) as des_call',
            'periode_date'
        );

        $joined = array("mst_user mu" => array("mu.user_nik" => $this->_alias_dipo.".nik"));

        $column_sort = $select[$sort_col];
        //get nik by user login
        $nik = $this->session->userdata("nik");
        //initialize.
        $data_filters   = array();
        $conditions     = array();

        $level = $this->session->userdata("level");
        $posisi = $this->session->userdata("posisi");
        $site = $this->session->userdata("site");

        if( $site == "DIPO") {
            $conditions = array("mu.user_nik" => $nik);
        }

        $status = STATUS_ALL;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'nik':
                        if ($value != "") {
                            $data_filters['lower(mu.user_nik)'] = $value;
                        }
                        break;

                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(name)'] = $value;
                        }
                        break;
                    case 'periode_date':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(periode_date as date) >="] = $date['start'];
                            $conditions["cast(periode_date as date) <="] = $date['end'];

                        }
                        break;

                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model($this->_tbl_dipo, $this->_alias_dipo, $this->_id_dipo)->get_all_data(array(
            'select'             => $select,
            'left_joined'        => $joined,
            'order_by'           => array($column_sort => $sort_dir),
            'limit'              => $limit,
            'start'              => $start,
            'conditions'         => $conditions,
            'filter'             => $data_filters,
            'status'             => $status,
            "count_all_first"    => true,
            "debug"              => false
        ));
        //get total rows
        $total_rows = $datas['total'];

        // $get_decode =
        $output = array(
            "data" => $datas['datas'],
            "draw" => intval($this->input->get("draw")),
            "recordsTotal" => $total_rows,
            "recordsFiltered" => $total_rows,
        );

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($output);
        exit;
    }

    ////////////////////////////// AJAX CALL ////////////////////////////////////
    /**
     * Function to get list_all_data hsbc
     */
    public function list_all_data_char() {
        //must ajax and must get.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "GET") {
            exit('No direct script access allowed');
        }

        //load model
        $this->load->model('Dynamic_model');

        //sanitize and get inputed data
        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
        $sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
        $limit    = sanitize_str_input($this->input->get("length"), "numeric");
        $start    = sanitize_str_input($this->input->get("start"), "numeric");
        $search   = sanitize_str_input($this->input->get("search")['value']);
        $filter   = $this->input->get("filter");

        $select = array(
            'upload_id',
            'nik',
            'name',
            'basic_sallary',
            // 'FROM_BASE64(SUBSTRING(basic_sallary,1,12)) as des_call',
            'periode_date'
        );

        $joined = array("mst_user mu" => array("mu.user_nik" => $this->_alias_char.".nik"));

        $column_sort = $select[$sort_col];
        //get nik by user login
        $nik = $this->session->userdata("nik");
        //initialize.
        $data_filters   = array();
        $conditions     = array();

        $level = $this->session->userdata("level");
        $posisi = $this->session->userdata("posisi");
        $site = $this->session->userdata("site");

        if( $site == "CHAR") {
            $conditions = array("mu.user_nik" => $nik);
        }

        $status = STATUS_ALL;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'nik':
                        if ($value != "") {
                            $data_filters['lower(mu.user_nik)'] = $value;
                        }
                        break;

                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(name)'] = $value;
                        }
                        break;
                    case 'periode_date':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(periode_date as date) >="] = $date['start'];
                            $conditions["cast(periode_date as date) <="] = $date['end'];

                        }
                        break;

                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model($this->_tbl_char, $this->_alias_char, $this->_id_char)->get_all_data(array(
            'select'             => $select,
            'left_joined'        => $joined,
            'order_by'           => array($column_sort => $sort_dir),
            'limit'              => $limit,
            'start'              => $start,
            'conditions'         => $conditions,
            'filter'             => $data_filters,
            'status'             => $status,
            "count_all_first"    => true,
            "debug"              => false
        ));
        //get total rows
        $total_rows = $datas['total'];

        // $get_decode =
        $output = array(
            "data" => $datas['datas'],
            "draw" => intval($this->input->get("draw")),
            "recordsTotal" => $total_rows,
            "recordsFiltered" => $total_rows,
        );

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($output);
        exit;
    }

    /**
    * function for preview slip
    * @param $id
    * @return array object
    */
    public function preview_print( $id = null)
    {
        if( empty($id) ) {
            show_404();
        }
        $this->load->model('Dynamic_model');

        $params = array(
            "select"        => "*",
            "conditions"    => array($this->_table_aliases.".upload_id" => $id),
            "row_array"     => true,
            "status"        => STATUS_ALL,
            "debug"         => false
        );

        $datas = $this->Dynamic_model->set_model(
            $this->_table,
            $this->_table_aliases,
            $this->_pk_field)->get_all_data($params)['datas']
        ;
        $data = array(
            "data_print" => $datas
        );
        // pr($datas);exit;
        $this->load->view("slip/preview", $data);
    }

    /**
    * function for preview slip
    * @param $id
    * @return array object
    */
    public function preview_print_hsbc( $id = null)
    {
        if( empty($id) ) {
            show_404();
        }
        $this->load->model('Dynamic_model');

        $params = array(
            "select"        => "*",
            "conditions"    => array($this->_alias.".upload_id" => $id),
            "row_array"     => true,
            "status"        => STATUS_ALL,
            "debug"         => false
        );

        $datas = $this->Dynamic_model->set_model(
            $this->_tbl,
            $this->_alias,
            $this->_id)->get_all_data($params)['datas']
        ;
        $data = array(
            "data_print" => $datas
        );
        // pr($datas);exit;
        $this->load->view("slip/preview-hsbc", $data);
    }

    /**
    * function for preview slip
    * @param $id
    * @return array object
    */
    public function preview_print_bni( $id = null)
    {
        if( empty($id) ) {
            show_404();
        }
        $this->load->model('Dynamic_model');

        $params = array(
            "select"        => "*",
            "conditions"    => array($this->_alias_bni.".upload_id" => $id),
            "row_array"     => true,
            "status"        => STATUS_ALL,
            "debug"         => false
        );

        $datas = $this->Dynamic_model->set_model(
            $this->_tbl_bni,
            $this->_alias_bni,
            $this->_id_bni)->get_all_data($params)['datas'];

        //set param to view
        $data['data_print'] = $datas;
        // pr($datas);exit;
        $this->load->view("slip/preview-bni", $data);
    }

    /**
    * function for preview slip
    * @param $id
    * @return array object
    */
    public function preview_print_dipo( $id = null)
    {
        if( empty($id) ) {
            show_404();
        }
        $this->load->model('Dynamic_model');

        $params = array(
            "select"        => "*",
            "conditions"    => array($this->_alias_dipo.".upload_id" => $id),
            "row_array"     => true,
            "status"        => STATUS_ALL,
            "debug"         => false
        );

        $datas = $this->Dynamic_model->set_model(
            $this->_tbl_dipo,
            $this->_alias_dipo,
            $this->_id_dipo)->get_all_data($params)['datas'];

        //set param to view
        $data['data_print'] = $datas;
        // pr($datas);exit;
        $this->load->view("slip/preview-dipo", $data);
    }

    /**
    * function for preview slip
    * @param $id
    * @return array object
    */
    public function preview_print_char( $id = null)
    {
        if( empty($id) ) {
            show_404();
        }
        $this->load->model('Dynamic_model');

        $params = array(
            "select"        => "*",
            "conditions"    => array($this->_alias_char.".upload_id" => $id),
            "row_array"     => true,
            "status"        => STATUS_ALL,
            "debug"         => false
        );

        $datas = $this->Dynamic_model->set_model(
            $this->_tbl_char,
            $this->_alias_char,
            $this->_id_char)->get_all_data($params)['datas'];

        //set param to view
        $data['data_print'] = $datas;
        // pr($datas);exit;
        $this->load->view("slip/preview-char", $data);
    }
    

    /**
    * function for detail slip
    * @param $id
    * @return array object
    */
    public function detail_print_aks( $id = null)
    {
        if( empty($id) ) {
            show_404();
        }
        // print_r($id);exit;
        $this->load->model('Dynamic_model');

        $params = array(
            "select"        => "*",
            "conditions"    => array($this->_table_aliases.".upload_id" => $id),
            "row_array"     => true,
            "status"        => STATUS_ALL,
            "debug"         => false
        );

        $datas = $this->Dynamic_model->set_model(
            $this->_table,
            $this->_table_aliases,
            $this->_pk_field)->get_all_data($params)['datas']
        ;
        $data = array(
            "data_print" => $datas
        );
        // pr($datas);exit;
        $this->load->view("slip/detail/detail-aks", $data);
    }

    /**
    * function for detail slip
    * @param $id
    * @return array object
    */
    public function detail_print_hsbc( $id = null)
    {
        if( empty($id) ) {
            show_404();
        }
        $this->load->model('Dynamic_model');

        $params = array(
            "select"        => "*",
            "conditions"    => array($this->_alias.".upload_id" => $id),
            "row_array"     => true,
            "status"        => STATUS_ALL,
            "debug"         => false
        );

        //prepare set parameter
        $datas = $this->Dynamic_model->set_model(
            $this->_tbl,
            $this->_alias,
            $this->_id)->get_all_data($params)['datas'];

        $data["data_print"] = $datas;

        $this->load->view("slip/detail/detail-hsbc", $data);
    }

    /**
    * function for detail slip
    * @param $id
    * @return array object
    */
    public function detail_print_bni( $id = null)
    {
        if( empty($id) ) {
            show_404();
        }
        $this->load->model('Dynamic_model');

        $params = array(
            "select"        => "*",
            "conditions"    => array($this->_alias_bni.".upload_id" => $id),
            "row_array"     => true,
            "status"        => STATUS_ALL,
            "debug"         => false
        );

        $datas = $this->Dynamic_model->set_model(
            $this->_tbl_bni,
            $this->_alias_bni,
            $this->_id_bni)->get_all_data($params)['datas'];

        $data["data_print"] = $datas;

        $this->load->view("slip/detail/detail-bni", $data);
    }

    /**
    * function for detail slip
    * @param $id
    * @return array object
    */
    public function detail_print_dipo( $id = null)
    {
        if( empty($id) ) {
            show_404();
        }
        $this->load->model('Dynamic_model');

        $params = array(
            "select"        => "*",
            "conditions"    => array($this->_alias_dipo.".upload_id" => $id),
            "row_array"     => true,
            "status"        => STATUS_ALL,
            "debug"         => false
        );

        $datas = $this->Dynamic_model->set_model(
            $this->_tbl_dipo,
            $this->_alias_dipo,
            $this->_id_dipo)->get_all_data($params)['datas'];

        $data["data_print"] = $datas;

        $this->load->view("slip/detail/detail-dipo", $data);
    }

    /**
    * function for detail slip
    * @param $id
    * @return array object
    */
    public function detail_print_char( $id = null)
    {
        if( empty($id) ) {
            show_404();
        }
        $this->load->model('Dynamic_model');

        $params = array(
            "select"        => "*",
            "conditions"    => array($this->_alias_char.".upload_id" => $id),
            "row_array"     => true,
            "status"        => STATUS_ALL,
            "debug"         => false
        );

        $datas = $this->Dynamic_model->set_model(
            $this->_tbl_char,
            $this->_alias_char,
            $this->_id_char)->get_all_data($params)['datas'];

        $data["data_print"] = $datas;

        $this->load->view("slip/detail/detail-char", $data);
    }

    // public function print_pdf( $id = null)
    // {
    //     if( empty($id) ) {
    //         show_404();
    //     }
    //     $this->load->model('Dynamic_model');

    //     $params = array(
    //         "select"        => "*",
    //         "conditions"    => array($this->_table_aliases.".upload_id" => $id),
    //         "row_array"     => true,
    //         "status"        => STATUS_ALL,
    //         "debug"         => false
    //     );

    //     //prepare set parameter
    //     $datas = $this->Dynamic_model->set_model(
    //         $this->_table,
    //         $this->_table_aliases,
    //         $this->_pk_field)->get_all_data($params)['datas'];

    //     $data['data_print'] = $datas;

    //     $this->load->library("pdf");
    //     $this->pdf->load_view('slip/print_pdf', $data);
    //     $this->pdf->render();
    //     $this->pdf->stream("SLIP-GAJI.pdf");
    // }

    /**
     * it will create a session token that it's validated if succeed.
     */
    public function check_password()
    {
        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //get from ajax POST.
        $pass = ($this->input->post("password") != null) ? trim($this->input->post("password")) : null;

        $this->load->model('admin/Admin_model');
        $this->db->trans_begin();

        $_currentUser = $this->session->userdata("name");
        //validate password.
        $login = $this->Admin_model->check_password($_currentUser, $pass);

        //check login valid or not.
        if (!$login) {
            $message['error_msg'] = "Password salah.";
            $this->output->set_content_type('application/json');
            echo json_encode($message);
            exit;
        }

        $this->db->trans_complete();

        //prepare returns.
        $message['is_error'] = false;
        $message['error_msg'] = "";

        //should we redirect?
        $message['redirect_to'] = "";

        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /**
     * it will create a session token that it's validated if succeed.
     */
    public function check_password_detail()
    {
        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //get from ajax POST.
        $pass = ($this->input->post("password") != null) ? trim($this->input->post("password")) : null;

        $this->load->model('admin/Admin_model');
        $this->db->trans_begin();

        $_currentUser = $this->session->userdata("name");
        //validate password.
        $login = $this->Admin_model->check_password($_currentUser, $pass);

        //check login valid or not.
        if (!$login) {
            $message['error_msg'] = "Password salah.";
            $this->output->set_content_type('application/json');
            echo json_encode($message);
            exit;
        }

        $this->db->trans_complete();

        //prepare returns.
        $message['is_error'] = false;
        $message['error_msg'] = "";
        $message['datas']     = $login['user_id'];

        //should we redirect?
        $message['redirect_to'] = site_url();

        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /*
     * Delete an staff.
     */
    public function delete() 
    {

        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Dynamic_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
        $message['error_msg'] = "";

        //sanitize input (id is primary key).
        $id = $this->input->post('id');

        //check first.
        if (empty($id)) {
            $message['error_msg'] = 'Invalid ID.';
        } else {

            //begin transaction
            $this->db->trans_begin();

            //delete the data (deactivate)
            $condition = array("upload_id" => $id);
            $delete = $this->Dynamic_model->set_model("tbl_upload","tu","upload_id")->delete($condition);

            //end transaction.
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();

                //failed.
                $message['error_msg'] = 'database operation failed';
            } else {
                $this->db->trans_commit();
                //success.
                $message['is_error'] = false;
                $message['error_msg'] = '';

                //growler.
                $message['notif_title'] = "Done!";
                $message['notif_message'] = "Data has been delete.";
                $message['redirect_to'] = "";
            }
        }
        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /*
     * Delete an hsbc.
     */
    public function delete_hsbc() 
    {

        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Dynamic_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
        $message['error_msg'] = "";

        //sanitize input (id is primary key).
        $id = $this->input->post('id');

        //check first.
        if (empty($id)) {
            $message['error_msg'] = 'Invalid ID.';
        } else {

            //begin transaction
            $this->db->trans_begin();

            //delete the data (deactivate)
            $condition = array("upload_id" => $id);
            $delete = $this->Dynamic_model->set_model("tbl_upload_hsbc","tuh","upload_id")->delete($condition);

            //end transaction.
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();

                //failed.
                $message['error_msg'] = 'database operation failed';
            } else {
                $this->db->trans_commit();
                //success.
                $message['is_error'] = false;
                $message['error_msg'] = '';

                //growler.
                $message['notif_title'] = "Done!";
                $message['notif_message'] = "Data has been delete.";
                $message['redirect_to'] = "";
            }
        }
        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /*
     * Delete an bni.
     */
    public function delete_bni() 
    {

        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Dynamic_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
        $message['error_msg'] = "";

        //sanitize input (id is primary key).
        $id = $this->input->post('id');

        //check first.
        if (empty($id)) {
            $message['error_msg'] = 'Invalid ID.';
        } else {

            //begin transaction
            $this->db->trans_begin();

            //delete the data (deactivate)
            $condition = array("upload_id" => $id);
            $delete = $this->Dynamic_model->set_model("tbl_upload_bni","tub","upload_id")->delete($condition);

            //end transaction.
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();

                //failed.
                $message['error_msg'] = 'database operation failed';
            } else {
                $this->db->trans_commit();
                //success.
                $message['is_error'] = false;
                $message['error_msg'] = '';

                //growler.
                $message['notif_title'] = "Done!";
                $message['notif_message'] = "Data has been delete.";
                $message['redirect_to'] = "";
            }
        }
        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /*
     * Delete an dipo.
     */
    public function delete_dipo() 
    {

        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Dynamic_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
        $message['error_msg'] = "";

        //sanitize input (id is primary key).
        $id = $this->input->post('id');

        //check first.
        if (empty($id)) {
            $message['error_msg'] = 'Invalid ID.';
        } else {

            //begin transaction
            $this->db->trans_begin();

            //delete the data (deactivate)
            $condition = array("upload_id" => $id);
            $delete = $this->Dynamic_model->set_model("tbl_upload_dipo","tud","upload_id")->delete($condition);

            //end transaction.
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();

                //failed.
                $message['error_msg'] = 'database operation failed';
            } else {
                $this->db->trans_commit();
                //success.
                $message['is_error'] = false;
                $message['error_msg'] = '';

                //growler.
                $message['notif_title'] = "Done!";
                $message['notif_message'] = "Data has been delete.";
                $message['redirect_to'] = "";
            }
        }
        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /*
     * Delete an char.
     */
    public function delete_char() 
    {

        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Dynamic_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
        $message['error_msg'] = "";

        //sanitize input (id is primary key).
        $id = $this->input->post('id');

        //check first.
        if (empty($id)) {
            $message['error_msg'] = 'Invalid ID.';
        } else {

            //begin transaction
            $this->db->trans_begin();

            //delete the data (deactivate)
            $condition = array("upload_id" => $id);
            $delete = $this->Dynamic_model->set_model("tbl_upload_char","tuc","upload_id")->delete($condition);

            //end transaction.
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();

                //failed.
                $message['error_msg'] = 'database operation failed';
            } else {
                $this->db->trans_commit();
                //success.
                $message['is_error'] = false;
                $message['error_msg'] = '';

                //growler.
                $message['notif_title'] = "Done!";
                $message['notif_message'] = "Data has been delete.";
                $message['redirect_to'] = "";
            }
        }
        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }
}
