<?php
class Model_Mau extends Zend_Db_Table_Abstract
{
    public $_name = "mau";
    public $_primary = "MaMau";

    public function getAll()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }    
    
    public function insert_mau($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    }
    
    public function getWhereIdMau($id_mau)
    {
        $se = $this->select()->where("MaMau = ?",$id_mau);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function update_data($id, $data){
        $kq = $this->update($data, "MaMau = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_mau($id){
        $kq = $this->delete("MaMau = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
}