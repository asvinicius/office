<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

    public function index() {
        if ($this->isLogged()){
            $page = $this->getPage();
            $pageid = array("page" => $page, "pagename" => "Gerenciamento de times");
            
            $this->load->model('TeamModel');
            $team = new TeamModel();
            
            $data = $team->listing();
            $msg = array("teams" => $data);
            
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('template/super/header', $pageid);
            $this->load->view('super/team', $msg);
            $this->load->view('template/footer');
        }else{
            redirect(base_url('login'));
        }
    }

    public function search() {
        if ($this->isLogged()){
            $page = $this->getPage();
            $pageid = array("page" => $page, "pagename" => "Gerenciamento de times");
            
            $this->load->model('TeamModel');
            $team = new TeamModel();
            
            $name = $this->input->post("searchtxt");
            
            $data = $team->specific($name);
            $msg = array("teams" => $data);
            
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('template/super/header', $pageid);
            $this->load->view('super/team', $msg);
            $this->load->view('template/footer');
        }else{
            redirect(base_url('login'));
        }
    }

    public function subscribe($teamid = null) {
        if ($this->isLogged()){
            
            $page = $this->getPage();
            
            $this->load->model('TeamModel');
            $this->load->model('SpinModel');
            $this->load->model('RegistryModel');
            $team = new TeamModel();
            $spin = new SpinModel();
            $reg = new RegistryModel();
            
            $data = $team->search($teamid);
            $data2 = $spin->listing();
            $data3 = $reg->listreg($teamid);
            
            $pageid = array("page" => $page, "pagename" => $data['name']);
            $msg = array("team" => $data, "spins" => $data2, "regs" => $data3);
            
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('template/super/header', $pageid);
            $this->load->view('super/teamview', $msg);
            $this->load->view('template/footer');
        }else{
            redirect(base_url('login'));
        }
    }

    public function delete($teamid = null) {
        if ($this->isLogged()){
            $this->load->model('TeamModel');
            $team = new TeamModel();
            
            if ($team->delete($teamid)) {
                redirect(base_url('team'));
            }
            
        }else{
            redirect(base_url('login'));
        }
    }

    public function getPage() {
        $current = array("id" => 1, "page" => "user");
        return array("current" => $current);
    }
}
