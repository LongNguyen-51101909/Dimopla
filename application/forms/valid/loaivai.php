<?php
class Form_Valid_Loaivai {
    
    public $messages;
    
    public function __construct($data){
        
        $val = new Zend_Validate_NotEmpty();
        $num =new Zend_Validate_Digits();
        
        if($val->isValid($data['tenloaivai'])==false)
            $this->messages[] = "Tên loại vải không được trống";
        
        if($val->isValid($data['masoi'])==false)
            $this->messages[] = "Mã sợi không được trống";
        if($num->isValid($data['masoi'])==false)
            $this->messages[] = "Mã sợi phải là số";
    }
    
    public function valid(){
        if($this->messages != "")
            return false;
        else 
            return true;
    }
}