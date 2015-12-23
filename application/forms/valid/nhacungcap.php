<?php
class Form_Valid_Nhacungcap {
    
    public $messages;
    
public function __construct($data){
        
        $val = new Zend_Validate_NotEmpty();
        $num =new Zend_Validate_Digits();
        
        if($val->isValid($data['ten'])==false)
            $this->messages[] = "Tên nhà cung cấp không được trống";
        
        if($num->isValid($data['sdt']) == false)
            $this->messages[] = "Số điện thoại phải là số";
        if($val->isValid($data['sdt'])==false)
            $this->messages[] = "Số điện thoại không được trống";
        
        if($num->isValid($data['fax']) == false)
            $this->messages[] = "Số fax phải là số";
        if($val->isValid($data['fax'])==false)
            $this->messages[] = "Số fax không được trống";
        
        if(array_key_exists('no',$data))
        {
            if($num->isValid($data['no']) == false)
                $this->messages[] = "Nợ phải là số";
            if($val->isValid($data['no'])==false)
                $this->messages[] = "Nợ không được trống";
        }
        
        
    }
    
    public function valid(){
        if($this->messages != "")
            return false;
        else 
            return true;
    }
}