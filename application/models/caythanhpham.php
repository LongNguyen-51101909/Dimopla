<?php
class Model_Caythanhpham extends Zend_Db_Table_Abstract
{
    public $_name = "caythanhpham";
    public $_primary = "MaCTP";

    public function getAll()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }    
    
    public function insert_ctp($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    }
    
    public function getWhere($id)
    {
        $se = $this->select()->where("MaCTP = ?",$id);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function getWhere_donxuat($id)
    {
        $se = $this->select()->where("MaDonXuat = ?",$id);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    public function getWhere_khohang($id)
    {
        $se = $this->select()->where("MaKho = ?",$id);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
   
    public function update_data($Ma, $data){
        $kq = $this->update($data, "MaCTP = '$Ma'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_ctp($id){
        $kq = $this->delete("MaCTP = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function getMaxIndex(){
    
        $row = $this->fetchRow(
            $this->select()
            ->from($this, array(new Zend_Db_Expr('max(MaCTP) as maxId')))
        );
        return $row['maxId'];
    }
}