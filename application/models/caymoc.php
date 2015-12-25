<?php
class Model_Caymoc extends Zend_Db_Table_Abstract
{
    public $_name = "caymoc";
    public $_primary = "MaMoc";

    public function getAll()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }    
    
    public function getWhere($id_caymoc)
    {
        $se = $this->select()->where("MaMoc = ?",$id_caymoc);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    // Long edit
    public function getWhereLike($key)
    {
        $se = $this->select()->where("MaMoc like ?", "%$key%");
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    public function getWhere_khomoc($id_kho)
    {
        $se = $this->select()->where("MaKhoMoc = ?",$id_kho);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    public function getWhere_loaivai($id_loaivai)
    {
        $se = $this->select()->where("MaLoaiVai = ?",$id_loaivai);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    public function getWhere_lonhuom($id_lonhuom)
    {
        $se = $this->select()->where("MaLoNhuom = ?",$id_lonhuom);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function getWhere_ctp($id_ctp)
    {
        $se = $this->select()->where("MaCTP = ?",$id_ctp);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $this->fetchRow($se)->toArray();
        else
            return false;
    }
    
    public function getWhere_IdHopdong($id_hopdong)
    {
        $se = $this->select()->where("MaHopDong = ?",$id_hopdong);
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    }
    
    
    public function insert_caymoc($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    }
    
    public function getMaxIndex(){
    
        $row = $this->fetchRow(
            $this->select()
            ->from($this, array(new Zend_Db_Expr('max(MaMoc) as maxId')))
        );
        return $row['maxId'];
    }
    
    public function update_data($MaMoc, $data){
        $kq = $this->update($data, "MaMoc = '$MaMoc'");
        if($kq)
            return true;
        else
            return false;
    }
    
    public function delete_caymoc($id){
        $kq = $this->delete("MaMoc = '$id'");
        if($kq)
            return true;
        else
            return false;
    }
}