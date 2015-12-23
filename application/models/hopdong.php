<?php
class Model_Hopdong extends Zend_Db_Table_Abstract
{
    public $_name = "hopdong";
    public $_primary = "MaHopDong";

    public function getAll()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }    
    
    public function getWhere($id)
    {
        $se = $this->select()->where("MaHopDong = ?",$id);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function getWhereIdDH($id_DonHang)
    {
        $se = $this->select()->where("MaDonHang = ?",$id_DonHang);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    public function getWhere_mau($id_mau)
    {
        $se = $this->select()->where("MaMau = ?",$id_mau);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    public function getWhere_donxuat($id_dx)
    {
        $se = $this->select()->where("MaDonXuat = ?",$id_dx);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    public function getWhere_ncc($id_ncc)
    {
        $se = $this->select()->where("MaNhaCungCap = ?",$id_ncc);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    
    
    public function insert_hopdong($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    }
    
    public function update_data($id, $data){
        $kq = $this->update($data, "MaHopDong = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_hopdong($id){
        $kq = $this->delete("MaHopDong = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
    // Long edit
    public function searchByKey($key)
    {
        $se = $this->select()->where("MaHopDong like ?", "%$key%");
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
}