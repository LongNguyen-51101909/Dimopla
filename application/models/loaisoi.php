<?php
class Model_Loaisoi extends Zend_Db_Table_Abstract
{
    public $_name = "loaisoi";
    public $_primary = "MaSoi";

    public function getAll()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }    
    
    public function insert_loaisoi($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    }
    
    public function getWhere($id)
    {
        $se = $this->select()->where("MaSoi = ?",$id);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function update_data($id, $data){
        $kq = $this->update($data, "MaSoi = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_loaisoi($id){
        $kq = $this->delete("MaSoi = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
}