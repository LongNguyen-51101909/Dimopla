<?php
class Model_Khachhang extends Zend_Db_Table_Abstract
{
    public $_name = "khachhang";
    public $_primary = "MaKhachHang";

    public function getAll()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
        {
            return $kq;
        }
        else
        {
            return false;
        }
    }

    public function getWhere($id)
    {
        $se = $this->select()->where("MaKhachHang = ?",$id);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    public function getWhere_congty()
    {
        $se = $this->select()->where("TenKhachHang = ?",'Công Ty');
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    // long add
    public function searchByKhachhng($kh)
    {
        $se = $this->select()->where("TenKhachHang like ?", "%$kh%");
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    //==============================================================
    public function getWhereIdSp($id_sanpham)
    {
        $se = $this->select()->where("id_sanpham = ?",$id_sanpham);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function getWhereMspSize($msp,$size)
    {
        
        $se = $this->select()
                   ->where("masp = ?",$msp)
                   ->where("size = ?",$size);
        $kq = $this->fetchAll($se)->toArray();
        $count = count($kq);
        if($count == 1){
            return $this->fetchRow($se)->toArray();
        }
        else if($count > 1)
        {
            return $kq;
        }
        else {
            return false;
        }
            
    }
    
    public function insert_khachhang($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_khachhang($id){
        $kq = $this->delete("MaKhachHang = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function update_data($id, $data){
        $kq = $this->update($data, "MaKhachHang = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
    

}