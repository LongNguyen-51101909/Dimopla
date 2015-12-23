<?php
class Form_Valid_Lonhuom{
    
    public $messages;
    
    public function __construct($data){
        
        $val = new Zend_Validate_NotEmpty();
        $num =new Zend_Validate_Digits();
        $date = new Zend_Validate_Date(array('format' => 'dd/MM/yyyy'));
        
        if($val->isValid($data['tenlonhuom'])==false)
            $this->messages[] = "Tên lô nhuộm không được trống";
        
        if($date->isValid($data['ngaynhuom'])==false)
            $this->messages[] = "Ngày nhuộm không đúng";
        
    }
    
    public function valid(){
        if($this->messages != "")
            return false;
        else 
            return true;
    }
}