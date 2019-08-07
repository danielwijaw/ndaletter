<?php
class dataletter extends CI_Model {

    public function getletter_notif()
    {
        $data = $this->db->query("SELECT * FROM tb_history where view = '1' and ke = '".$this->session->userdata('nip')."' order by id_history DESC limit 4");
        return $data->result_array();
    }

    public function skipnotif()
    {
    	$this->db->set('view', '2');
    	$this->db->update('tb_history');
    }

    public function getlogin($login)
    {
        $data = $this->db->get_where('tm_user', array('nip' => $login['nip'], 'password' => $login['password']));
        return $data->result_array();
    }

    public function getuser()
    {
        $data = $this->db->get('tm_user');
        return $data->result_array();
    }

}