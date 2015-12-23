<?php
class Form_Valid_Hoadon {
    
    public $messages;
    
    public function __construct($data,$sodu,$tongno){
        
        $val = new Zend_Validate_NotEmpty();
        $num =new Zend_Validate_Digits();
        $date = new Zend_Validate_Date(array('format' => 'dd/MM/yyyy'));
        
        if($val->isValid($data['tenhoadon'])==false)
            $this->messages[] = "Tên Hóa Đơn không được trống";
        
        if($val->isValid($data['tienthanhtoan'])==false)
        {
            $this->messages[] = "Tiền thanh toán được trống";
        }
        else if($num->isValid($data['tienthanhtoan']) == false)
        {
            $this->messages[] = "Tiền thanh toán phải là số";
        }
        else if($data['tienthanhtoan'] > $sodu) 
        {
            $this->messages[] = "Tiền thanh toán phải nhỏ hơn số dư";
        }
        else if($data['tienthanhtoan'] > $tongno)
        {
            $this->messages[] = "Tiền thanh toán không lớn hơn số nợ";
        }
        else if($data['tienthanhtoan'] < 0)
        {
            $this->messages[] = "Tiền thanh toán phải là số dương";
        }
        if($date->isValid($data['ngaythanhtoan'])==false)
            $this->messages[] = "Ngày thanh toán không đúng";
        
    }
    
    public function valid(){
        if($this->messages != "")
            return false;
        else 
            return true;
    }
}