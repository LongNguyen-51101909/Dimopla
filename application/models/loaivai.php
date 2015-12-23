<?php
class Model_Loaivai extends Zend_Db_Table_Abstract
{
    public $_name = "loaivai";
    public $_primary = "MaVai";

    public function getAll()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }    
    
    public function getWhere($id_loaivai)
    {
        $se = $this->select()->where("MaVai = ?",$id_loaivai);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function getWhere_loaisoi($id_soi)
    {
        $se = $this->select()->where("MaSoi = ?",$id_soi);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    public function insert_loaivai($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    }
    
    public function update_data($id, $data){
        $kq = $this->update($data, "MaVai = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_loaivai($id){
        $kq = $this->delete("MaVai = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
}