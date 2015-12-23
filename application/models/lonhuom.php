<?php
class Model_Lonhuom extends Zend_Db_Table_Abstract
{
    public $_name = "lonhuom";
    public $_primary = "MaLoNhuom";

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
        $se = $this->select()->where("MaLoNhuom = ?",$id);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function getWhere_mau($id)
    {
        $se = $this->select()->where("MaMau = ?",$id);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    public function insert_lonhuom($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    }
    
    public function update_data($Ma, $data){
        $kq = $this->update($data, "MaLoNhuom = '$Ma'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function getMaxIndex(){
        
         $row = $this->fetchRow(
            $this->select()
            ->from($this, array(new Zend_Db_Expr('max(MaLoNhuom) as maxId')))
        );
        return $row['maxId']; 
    }
    
    public function delete_lonhuom($id){
        $kq = $this->delete("MaLoNhuom = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
    // Long edit
    public function searchByKey($key)
    {
        $se = $this->select()->where("TenLoNhuom like ?", "%$key%");
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
}