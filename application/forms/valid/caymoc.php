<?php
class Form_Valid_Caymoc{
    
    public $messages;
    
    public function __construct($data, $sotan){
        
        $val = new Zend_Validate_NotEmpty();
        $num =new Zend_Validate_Digits();
      //  $kh = new Model_Khachhang();
        
        if($val->isValid($data['sokgsoi'])==false)
            $this->messages[] = "Số kg sợi phải không được trống";
        else if($num->isValid($data['sokgsoi'])==false)
            $this->messages[] = "Số kg sợi phải là số";
        else if($data['sokgsoi']> $sotan*1000)
            $this->messages[] = "Trong kho chỉ còn ".($sotan*1000)." kg sợi.";
        
        if($val->isValid($data['sometvai'])==false)
            $this->messages[] = "Số mét vải không được trống";
        else if($num->isValid($data['sometvai'])==false)
            $this->messages[] = "Số mét vải phải là số";
        
    }
    
    public function valid(){
        if($this->messages != "")
            return false;
        else 
            return true;
    }
}