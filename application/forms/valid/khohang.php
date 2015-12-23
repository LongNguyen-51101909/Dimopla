<?php
class Form_Valid_Khohang{
    
    public $messages;
    
    public function __construct($data){
        
        $val = new Zend_Validate_NotEmpty();
        $num =new Zend_Validate_Digits();
        
        if($val->isValid($data['tenkhohang'])==false)
            $this->messages[] = "Tên kho hàng không được trống!";
        
        if($val->isValid($data['diachi'])==false)
            $this->messages[] = "Địa chỉ kho hàng không được trống!";
        
        if($val->isValid($data['sdt'])==false)
            $this->messages[] = "Số điện thoại không được trống!";
        
        if($num->isValid($data['sdt']) == false)
            $this->messages[] = "Số điện thoại phải là số";
    }
    
    public function valid(){
        if($this->messages != "")
            return false;
        else 
            return true;
    }
}