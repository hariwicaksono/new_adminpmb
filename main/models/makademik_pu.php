<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Makademik_pu extends CI_Model{
var $table_name="akademik_pu";

function cari($data=array()){
return $this->db->get_where($this->table_name,$data);
}
}
?>