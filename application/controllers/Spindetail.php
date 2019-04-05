<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Spindetail extends CI_Controller {
    
    public function detail($spinid) {
        if ($this->isLogged()){
            $page = $this->getPage();
            $pageid = array("page" => $page, "pagename" => "Rodada ".$spinid);
            
            $this->load->model('SpinModel');
            $this->load->model('RegistryModel');
            $spin = new SpinModel();
            $reg = new RegistryModel();
            
            $data = $reg->listing($spinid);
            $msg = array("teams" => $data, "spin" => $spinid);
            
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('template/super/header', $pageid);
            $this->load->view('super/spindetail', $msg);
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
    
    public function changestatus($newsid=null) {
        if ($this->isLogged()){
            $this->load->model('NewsModel');
            $news = new NewsModel();
            
            $data = $news->search($newsid);
            
            if($data['status'] == 0){
                $data['status'] = 1;
            }else{
                $data['status'] = 0;
            }
            
            if ($news->update($data)) {
                redirect(base_url('viewnews/index/' . $data['newsid']));
            }
        }else{
            redirect(base_url('login'));
        }
    }

    public function delete($newsid = null) {
        if ($this->isLogged()){
            $this->load->model('NewsModel');
            $news = new NewsModel();
            
            if ($news->delete($newsid)) {
                redirect(base_url('news'));
            }
            
        }else{
            redirect(base_url('login'));
        }
    }

    public function getPage() {
        $current = array("id" => 2, "page" => "user");
        return array("current" => $current);
    }
}
