<?php
class Form_Valid_Khachhang{
    
    public $messages;
    
    public function __construct($data){
        
        $val = new Zend_Validate_NotEmpty();
        $num =new Zend_Validate_Digits();
      //  $kh = new Model_Khachhang();
//         echo "<pre>";
//         print_r($data);
//         echo "</pre>";
        if($val->isValid($data['ten'])==false)
            $this->messages[] = "Tên Khách hàng không được trống";
        
        if($val->isValid($data['sdt'])==false)
            $this->messages[] = "Số điện thoại Không được trống";
        
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