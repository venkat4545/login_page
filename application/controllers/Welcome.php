<?php
ob_start();
		defined('BASEPATH') OR exit('No direct script access allowed');
          require 'vendor/autoload.php';
          use GuzzleHttp\Client;
          use OAuth2\Server;
          use OAuth2\Storage\Pdo;
          use OAuth2\GrantType\ClientCredentials;

          class Welcome extends CI_Controller {

			public function __construct(){

				parent::__construct();
				$this->load->helper('url');
				$this->load->database();
				// Load zip library
				$this->load->library('zip');
				$this->load->helper('download');
				$this->load->helper('cookie');
				$this->load->model('user_model');
				$this->load->model('admin_model');
                    $this->load->library('session');
                    $this->load->library('form_validation');
                    $this->load->config('email');
                    $this->load->library('email');  
                    $this->load->library('encrypt'); 
                    date_default_timezone_set('Asia/Calcutta');
                    $dateTime = new DateTime('now', new DateTimeZone('Asia/Calcutta')); 
                }
               
                function index(){
                    $data['users'] = $this->admin_model->getAllData("users");
                    $this->load->view('user_login',$data); 
               }

               function login(){
                    $jwt=new JWT();
                    $client = new Client();
                    $jwtsecretkey="MySecretKeyHere";
                    $email=$this->input->post('user_email');
                    $password=$this->input->post('user_password');
                    $result=$this->user_model->user_can_login($email,$password);
                    $token=$jwt->encode($email,$jwtsecretkey,'HS256');
                    $data['token']=$jwt->encode($email,$jwtsecretkey,'HS256');
                    if($result){
                         echo '<script>alert("'.$result.'");</script>';
                         redirect(base_url(),'refresh');
                    }else{
                         $data['users'] = $this->admin_model->getAllData("users");
                         $this->load->view('user_welcome',$data);
                    }
               }

               function signup(){
                    $this->load->view('user_signup');
               }

               function user_singnup(){
                    $data['email']=$this->input->post('user_email');
                    $data['name']=$this->input->post('user_name');
                    $data['password']=$this->input->post('user_password');
                    $data['address']=$this->input->post('user_address');
                    $result=$this->user_model->user_singnup('users',$data);
                    if(!$result){
                         echo '<script>alert("'.$result.'");</script>';
                         redirect(base_url(),'refresh');
                    }else{
                         $data['users'] = $this->admin_model->getAllData("users");
                         $this->load->view('user_welcome',$data);
                    }
               }

          }