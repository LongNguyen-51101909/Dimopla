<?php
class Model_Hoadon extends Zend_Db_Table_Abstract
{
    public $_name = "hoadon";
    public $_primary = "MaHoaDon";

    public function getAll()
    {
        $se = $this->select();
        $kq = $this->fetchAll($se)->toArray();
        if($kq)
            return $kq;
        else
            return false;
    } 

    public function insert_hoadon($data){
        $kq = $this->insert($data);
        if($kq)
            return true;
        else
            return false;
    }
}