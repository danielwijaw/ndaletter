<?php
class dataletter extends CI_Model {

    public function getletter_notif()
    {
        $data = $this->db->query("SELECT * FROM tb_history order by id_history DESC limit 4");
        return $data->result_array();
    }

}