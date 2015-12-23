<?php
class Model_Khosoi extends Zend_Db_Table_Abstract
{
    public $_name = "khosoi";
    public $_primary = "MaKhoSoi";

    public function getAll()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }   
    
    public function getIdKho()
    {
         $row = $this->fetchAll(
            $this->select()->distinct()
            ->from($this, array(new Zend_Db_Expr('MaKho')))
        )->toArray();
        return $row;
    }

    public function insert_kho($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    }
    
    public function getWhere($id)
    {
        $se = $this->select()->where("MaKhoSoi = ?",$id);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
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
    public function update_data($id, $data){
        $kq = $this->update($data, "MaKhoSoi = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_kho($id){
        $kq = $this->delete("MaKhoSoi = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
}