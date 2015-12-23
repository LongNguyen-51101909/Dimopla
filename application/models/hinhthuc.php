<?php
class Model_Hinhthuc extends Zend_Db_Table_Abstract
{
    public $_name = "hinhthuc";
    public $_primary = "MaHinhThuc";

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
        $se = $this->select()->where("MaHinhThuc = ?",$id);
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