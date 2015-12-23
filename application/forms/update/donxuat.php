<?php
class Form_Update_Donxuat extends Zend_Form{
    public function init(){
       
    }
    
    public function createForm($id_cm)
    {
        $kh = new Model_Donxuat();
        $donxuat = $kh->getWhere($id_cm);
    
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/donxuat_layout.phtml')),
                'Form'
        ));
    
        $tendonxuat= $this->createElement('text', 'tendonxuat', array('decorators' => array('ViewHelper'),));
        $ngayxuat = $this->createElement('text', 'ngayxuat', array('decorators' => array('ViewHelper'),'data-type' => 'date'));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chỉnh sửa'));
        
        $mydate = Zend_Locale_Format::getDate($donxuat[0]['NgayXuat'],array("date_format"=>"yyyy.MM.dd"));
        $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
        
        $tendonxuat->setAttrib('class', 'formEdit')->setValue($donxuat[0]['TenDonXuat']);
        $ngayxuat->setAttrib('class', 'formEdit')->setValue($date_str);
        
        $this->addElement($tendonxuat)
        ->addElement($ngayxuat)
        ->addElement($them)
        ;
        
    }
}