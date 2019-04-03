<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        if ($this->isLogged()){
            
            $msg = array("pagename" => "Inicio");
            
            $this->load->view('template/super/menu');
            $this->load->view('template/super/header', $msg);
            $this->load->view('super/welcome');
            $this->load->view('template/footer');
        }else{
            redirect(base_url('login'));
        }
    }

}