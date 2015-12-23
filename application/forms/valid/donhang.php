<?php
class Form_Valid_Donhang{
    
    public $messages;
    
    public function __construct($data){
        
        $val = new Zend_Validate_NotEmpty();
        $num =new Zend_Validate_Digits();
        $date = new Zend_Validate_Date(array('format' => 'dd/MM/yyyy'));
        
        if($val->isValid($data['tendonhang'])==false)
            $this->messages[] = "Tên đơn hàng không được trống";
        
        if($date->isValid($data['ngaydathang'])==false)
            $this->messages[] = "Ngày đặt hàng không đúng";
        
        if($val->isValid($data['tiendathang'])==false)
            $this->messages[] = "Tiền đặt hàng Không được trống";
        if($num->isValid($data['tiendathang']) == false) 
            $this->messages[] = "Tiền đặt hàng phải là số";
        
        if($num->isValid($data['sometvai']) == false)
            $this->messages[] = "Số mét vải phải là số";
        if($val->isValid($data['sometvai'])==false)
            $this->messages[] = "Số mét vải Không được trống";
        
        if(array_key_exists('makhachhang',$data))
        {
            if($num->isValid($data['makhachhang']) == false)
                $this->messages[] = "Mã khách hàng phải là số";
            if($val->isValid($data['makhachhang'])==false)
                $this->messages[] = "Mã khách hàng không được trống";
        }
    }
    
    public function valid(){
        if($this->messages != "")
            return false;
        else 
            return true;
    }
}