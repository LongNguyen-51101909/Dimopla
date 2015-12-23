<?php
class Form_Valid_Loaisoi {
    
    public $messages;
    
    public function __construct($data){
        
        $val = new Zend_Validate_NotEmpty();
        $num =new Zend_Validate_Digits();
        
        if($val->isValid($data['tenloaisoi'])==false)
            $this->messages[] = "Tên loại vải không được trống";
       
    }
    
    public function valid(){
        if($this->messages != "")
            return false;
        else 
            return true;
    }
}