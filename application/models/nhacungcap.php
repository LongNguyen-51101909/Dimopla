<?php
class Model_Nhacungcap extends Zend_Db_Table_Abstract
{
    public $_name = "nhacungcap";
    public $_primary = "MaNhaCungCap";

    public function getAll()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }    
    
    public function getWhere($id_ncc)
    {
        $se = $this->select()->where("MaNhaCungCap = ?",$id_ncc);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function insert_nhacungcap($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    }
    
    public function update_data($MaNcc, $data){
        $kq = $this->update($data, "MaNhaCungCap = '$MaNcc'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_nhacungcap($id){
        $kq = $this->delete("MaNhaCungCap = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
}