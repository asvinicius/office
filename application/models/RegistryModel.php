<?php
class RegistryModel extends CI_Model{
    
    protected $registryid;
    protected $team;
    protected $spin;
    protected $admin;
            
    function __construct() {
        parent::__construct();
        $this->setRegistryid(null);
        $this->setTeam(null);
        $this->setSpin(null);
        $this->setAdmin(null);
    }
    
    public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('registry', $data)) {
                return true;
            }
        }
    }
    public function update($data = null) {
        if ($data != null) {
            $this->db->where("registryid", $data['registryid']);
            if ($this->db->update('registry', $data)) {
                return true;
            }
        }
    }
    public function delete($registryid) {
        if ($registryid != null) {
            $this->db->where("registryid", $registryid);
            if ($this->db->delete("registry")) {
                return true;
            }
        }
    }
    
    public function getreg($team, $spin) {
        $this->db->where("spin", $spin);
        $this->db->where("team", $team);
        return $this->db->get("registry")->row_array();
    }
    
    public function listreg($team) {
        $this->db->where("team", $team);
        return $this->db->get("registry")->result();
    }
    
    public function listing($spin) {
        $this->db->where("spin", $spin);
        $this->db->join('team', 'team.teamid=team', 'inner');
        $this->db->join('user', 'user.userid=admin', 'inner');
        $this->db->order_by("registryid", "asc");
        return $this->db->get("registry", 10)->result();
    }
    
    public function codelist($spin) {
        $this->db->where("spin", $spin);
        $this->db->join('team', 'team.teamid=team', 'inner');
        $this->db->join('user', 'user.userid=admin', 'inner');
        $this->db->order_by("registryid", "asc");
        return $this->db->get("registry")->result();
    }
    
    public function spin($name, $spin) {
        $this->db->where("spin", $spin);
        $this->db->join('team', 'team.teamid=team', 'inner');
        $this->db->like("team.name", $name);
        $this->db->or_like("team.coach", $name);
        $this->db->join('user', 'user.userid=admin', 'inner');
        return $this->db->get("registry")->result();
    }
    
    function getRegistryid() {
        return $this->registryid;
    }

    function getTeam() {
        return $this->team;
    }

    function getSpin() {
        return $this->spin;
    }

    function getAdmin() {
        return $this->admin;
    }

    function setRegistryid($registryid) {
        $this->registryid = $registryid;
    }

    function setTeam($team) {
        $this->team = $team;
    }

    function setSpin($spin) {
        $this->spin = $spin;
    }

    function setAdmin($admin) {
        $this->admin = $admin;
    }


}