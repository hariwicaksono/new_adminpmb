<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdosen extends CI_Model{
function get_dosen($data=array()){
 return $this->db->get_where('dosen',$data);
}

}
?>