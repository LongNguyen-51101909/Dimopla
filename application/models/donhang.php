<?php
class Model_Donhang extends Zend_Db_Table_Abstract
{
    public $_name = "donhang";
    public $_primary = "MaDonHang";

    public function getAll()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }   
    
    public function getWhereIdKH($id_khachhang)
    {
        $se = $this->select()->where("MaKhachHang = ?",$id_khachhang);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    public function getWhere($id_donhang)
    {
        $se = $this->select()->where("MaDonHang = ?",$id_donhang);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    

    public function insert_donhang($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    }
    public function update_data($id, $data){
        $kq = $this->update($data, "MaDonHang = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_donhang($id){
        $kq = $this->delete("MaDonHang = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
    // Long edit
    public function searchByKey($key)
    {
        $se = $this->select()->where("TenDonHang like ?", "%$key%");
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
}