<?php
class Model_Loaikho extends Zend_Db_Table_Abstract
{
    public $_name = "loaikho";
    public $_primary = "MaLoaiKho";

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
        $se = $this->select()->where("MaLoaiKho = ?",$id);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function getWhere_Tenkho($id)
    {
        $se = $this->select()->where("TenLoaiKho = ?",$id);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function update_data($id, $data){
        $kq = $this->update($data, "MaLoaiKho = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_kho($id){
        $kq = $this->delete("MaLoaiKho = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
}