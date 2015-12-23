<?php
class Form_Valid_Hopdong {
    
    public $messages;
    
    public function __construct($data){
    
        $val = new Zend_Validate_NotEmpty();
        $num =new Zend_Validate_Digits();
        $date = new Zend_Validate_Date(array('format' => 'dd/MM/yyyy'));
    
        if($num->isValid($data['sotansoi'])==false)
            $this->messages[] = "Số Tấn Sợi phải là số";
        if($date->isValid($data['ngaymua'])==false)
            $this->messages[] = "Ngày mua không đúng";
        if($num->isValid($data['thanhtien'])==false)
            $this->messages[] = "Thành Tiền phải là số";
    }
    
    public function valid(){
        if($this->messages != "")
            return false;
        else 
            return true;
    }
}