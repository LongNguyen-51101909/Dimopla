<?php
class Form_Valid_Mau{
    
    public $messages;
    
    public function __construct($data){
        
        $val = new Zend_Validate_NotEmpty();
        $num =new Zend_Validate_Digits();
      //  $kh = new Model_Khachhang();
        
        if($val->isValid($data['tenmau'])==false)
            $this->messages[] = "Tên màu không được trống";
        
        if($val->isValid($data['congthuc'])==false)
            $this->messages[] = "Công thức được trống";
        
    }
    
    public function valid(){
        if($this->messages != "")
            return false;
        else 
            return true;
    }
}