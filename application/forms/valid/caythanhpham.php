<?php
class Form_Valid_Caythanhpham{
    
    public $messages;
    
    public function __construct($data){
        
        $val = new Zend_Validate_NotEmpty();
        $num =new Zend_Validate_Digits();
      //  $kh = new Model_Khachhang();
        
        if($val->isValid($data['TenCTP'])==false)
            $this->messages[] = "Cây thành phẩm không được trống";
        
        if($num->isValid($data['sometvai']) == false)
            $this->messages[] = "Số mét vải phải là số";
        
        if(array_key_exists('loaivai',$data))
        {
            if($val->isValid($data['loaivai'])==false)
                $this->messages[] = "Vui lòng điền loại vải!";
        }
        
    }
    
    public function valid(){
        if($this->messages != "")
            return false;
        else 
            return true;
    }
}