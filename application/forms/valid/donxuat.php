<?php
class Form_Valid_Donxuat{
    
    public $messages;
    
    public function __construct($data){
        
        $val = new Zend_Validate_NotEmpty();
        $date = new Zend_Validate_Date(array('format' => 'dd/MM/yyyy'));
        
        if($val->isValid($data['tendonxuat'])==false)
            $this->messages[] = "Tên đơn xuất không được trống";
        
        
        if($date->isValid($data['ngayxuat']) == false) 
            $this->messages[] = "Ngày xuất không đúng";
    }
    
    public function valid(){
        if($this->messages != "")
            return false;
        else 
            return true;
    }
}