<?php
class Model_Donxuat extends Zend_Db_Table_Abstract
{
    public $_name = "donxuat";
    public $_primary = "MaDonXuat";

    public function getAll()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }   
    public function insert_donxuat($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    } 
    
    public function getWhere($id)
    {
        $se = $this->select()->where("MaDonXuat = ?",$id);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    public function update_data($Ma, $data){
        $kq = $this->update($data, "MaDonXuat = '$Ma'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_donxuat($id){
        $kq = $this->delete("MaDonXuat = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function getMaxIndex(){
    
        $row = $this->fetchRow(
            $this->select()
            ->from($this, array(new Zend_Db_Expr('max(MaDonXuat) as maxId')))
        );
        return $row['maxId'];
    }
}
