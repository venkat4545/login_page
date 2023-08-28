<?php
ob_start();
		defined('BASEPATH') OR exit('No direct script access allowed');

          class Admin extends CI_Controller {

			public function __construct(){

				parent::__construct();
				$this->load->helper('url');
				$this->load->database();
				// Load zip library
				$this->load->library('zip');
				$this->load->helper('download');
				$this->load->model('admin_model');
                $this->load->model('user_model');
                $this->load->library('session');
				$this->load->helper('cookie');
                $this->load->library('form_validation');
                $this->load->config('email');
                $this->load->library('email');  
                $this->load->library('encrypt');
                $this->load->library('upload');
                $this->load->library('form_validation');
                date_default_timezone_set("Asia/Kolkata");
                $dateTime = new DateTime('now', new DateTimeZone("Asia/Kolkata")); 
                }
                
                function index(){
                    $this->load->view('admin/admin_login');
                }
            }