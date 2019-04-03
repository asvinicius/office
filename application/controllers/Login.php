<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        if ($this->session->userdata('logged') === TRUE) {
            redirect(base_url('welcome'));
        } else {
            $this->load->view('public/login');
        }
    }
    
    public function signin() {
        $this->load->model("LoginModel");
        $username = $this->input->post("username");
        $password = md5($this->input->post("password"));
        $user = $this->LoginModel->search($username, $password);
        
        if($user){
            if($user['status'] == '1'){
                $session = array(
                    'userid' => $user["userid"],
                    'name' => $user["name"],
                    'role' => $user["role"],
                    'logged' => TRUE
                );

                $this->session->set_userdata($session);

                redirect(base_url('login'));
            }else{
                $loginfail = array(
                    "class" => "danger",
                    "message" => "Sinto muito!<br />Voca nao pode acessar o sistema neste momento.");

                $msg = array("loginfail" => $loginfail);

                $this->load->view('public/login', $msg);
            }
        }else {
            $loginfail = array(
                "class" => "danger",
                "message" => "Usuario ou senha incorretos");
            
            $msg = array("loginfail" => $loginfail);
            
            $this->load->view('public/login', $msg);
        }
    }
    
    public function signout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}