<?php 
ob_start();
class Model_crud extends Model{
    
function updateData($tablename="",$dataupdate=array(),$where=array()){
            $this->db->update($tablename,$dataupdate,$where);
            
        }

     function insertData($tablename="",$data=array()){
        $this->db->insert($tablename,$data);
     }

     function selectData($tablename='',$data=array()){
        return $this->db->get_where($tablename,$data);
     }

     function deleteData($tablename='',$data=array()){
        $this->db->delete($tablename,$data);
     }

     
}
?>

