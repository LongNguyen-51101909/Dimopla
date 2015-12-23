<?php
class Form_Valid_Taotaikhoan{
    
    public $messages;
    
    public function __construct($data){
        
        $val = new Zend_Validate_NotEmpty();
        $email= new Zend_Validate_EmailAddress();
      
        
        if($val->isValid($data['tentaikhoan'])==false)
            $this->messages[] = "Vui lòng điền tên tài khoản!";
        
        if($val->isValid($data['matkhau'])==false)
            $this->messages[] = "Vui lòng điền mật khẩu!";
       
        
        if($val->isValid($data['capbac'])==false)
            $this->messages[] = "Vui lòng điền cấp bậc!";
        if($email->isValid($data['email'])==false)
            $this->messages[] = "Vui lòng điền đầy đủ địa chỉ email";
        
        
    }
    
    public function valid(){
        if($this->messages != "")
            return false;
        else 
            return true;
    }
}