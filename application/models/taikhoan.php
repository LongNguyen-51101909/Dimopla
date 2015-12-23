<?php
class Model_Taikhoan extends Zend_Db_Table_Abstract
{
    public $_name = "taikhoan";
    public $_primary = "MaTaiKhoan";

    public function getAll()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }    
    
    public function getRow()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function getWhere($id_taikhoan)
    {
        $se = $this->select()->where("MaTaiKhoan = ?",$id_taikhoan);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function insert_taikhoan($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    }
    
    public function getMaxIndex(){
    
        $row = $this->fetchRow(
            $this->select()
            ->from($this, array(new Zend_Db_Expr('max(MaTaiKhoan) as maxId')))
        );
        return $row['maxId'];
    }
    
    public function update_data($id_taikhoan, $data){
        $kq = $this->update($data, "MaTaiKhoan = '$id_taikhoan'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_taikhoan($id){
        $kq = $this->delete("MaTaiKhoan = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
}