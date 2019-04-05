<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Addteam extends CI_Controller {

    public function prepare($spinid) {
        if ($this->isLogged()){
            $page = $this->getPage();
            $pageid = array("page" => $page, "pagename" => "Rodada ".$spinid);
            
            $this->load->model('TeamModel');
            $team = new TeamModel();
            $data = $team->listing();
            $msg = array("teams" => $data);
            
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('template/super/header', $pageid);
            $this->load->view('super/addteam', $msg);
            $this->load->view('template/footer');
        }else{
            redirect(base_url('login'));
        }
    }
    
    public function search() {
        if ($this->isLogged()){
            
            $page = $this->getPage();
            $pageid = array("page" => $page, "pagename" => "Inscrever time");
            $name = $this->input->post("team");
            
            $this->load->model('TeamModel');
            $team = new TeamModel();
            
            $data = $team->specific($name);
            $msg = array("teams" => $data);
            
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('template/super/header', $pageid);
            $this->load->view('super/newteam', $msg);
            $this->load->view('template/footer');
            
            
        }else{
            redirect(base_url('login'));
        }
    }
    
    public function searchteams($team=null) {
        
        $url = 'https://api.cartolafc.globo.com/times?q='.$team;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER ,[
          'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
          'Content-Type: application/json',
        ]);
        $result = curl_exec($ch);
        
        if ($result === FALSE) {
            die(curl_error($ch));
        }
        
        curl_close($ch);
        
        $json = json_decode($result, true);
        
        return $json;
    }

    public function choose($slug = null) {
        if ($this->isLogged()){
            $this->load->model('TeamModel');
            $team = new TeamModel();
            
            $json = $this->select($slug);
            $selected = $json['time'];
            
            $teamdata['teamid'] = $selected['time_id'];
            $teamdata['name'] = $selected['nome'];
            $teamdata['coach'] = $selected['nome_cartola'];
            $teamdata['slug'] = $selected['slug'];
            $teamdata['shield'] = $selected['url_escudo_svg'];
            $teamdata['status'] = 1;
            
            $restriction = $team->search($teamdata['teamid']);
            
            if($restriction == null){
            
                if($team->save($teamdata)){
                    redirect(base_url('team'));
                }
                
            }else{
                redirect(base_url('team'));
            }
        }else{
            redirect(base_url('login'));
        }
    }
    
    public function select($slug=null) {
        
        $url = 'https://api.cartolafc.globo.com/time/slug/'.$slug;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER ,[
          'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
          'Content-Type: application/json',
        ]);
        $result = curl_exec($ch);
        
        if ($result === FALSE) {
            die(curl_error($ch));
        }
        
        curl_close($ch);
        
        $json = json_decode($result, true);
        
        return $json;
    }

    public function getPage() {
        $current = array("id" => 2, "page" => "user");
        return array("current" => $current);
    }
}
