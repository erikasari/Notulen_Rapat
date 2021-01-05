<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Peserta_model extends CI_Model
{
    public function insertpeserta($data)
    {
        return $this->db->insert('mst_peserta', $data);
    }
    public function verifyemail($key)
    {
        $data = array('is_active' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('mst_peserta', $data);
    }
}
