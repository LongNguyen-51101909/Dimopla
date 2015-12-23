<?php
class Model_Khohang extends Zend_Db_Table_Abstract
{
    public $_name = "khohang";
    public $_primary = "MaKho";

    public function getAll()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }   

    public function insert_khohang($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    }
    
    public function getWhere($id)
    {
        $se = $this->select()->where("MaKho = ?",$id);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function getWhere_loaivai($id)
    {
        $se = $this->select()->where("MaVai = ?",$id);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function getWhere_loaikho($id)
    {
        $se = $this->select()->where("MaLoaiKho = ?",$id);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    public function update_data($id, $data){
        $kq = $this->update($data, "MaKho = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_kho($id){
        $kq = $this->delete("MaKho = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
}