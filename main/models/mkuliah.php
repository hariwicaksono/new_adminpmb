<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mkuliah extends CI_Model{
function get_kuliah($data=array()){
 return $this->db->get_where('kuliah',$data);
}

}
?>