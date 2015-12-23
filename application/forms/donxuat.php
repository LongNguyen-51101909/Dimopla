<?php
class Form_Donxuat extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/donxuat_layout.phtml')),
                'Form'
        ));
        
        $tendonxuat= $this->createElement('text', 'tendonxuat', array('decorators' => array('ViewHelper'),));
        $ngayxuat = $this->createElement('text', 'ngayxuat', array('decorators' => array('ViewHelper'),'data-type' => 'date'));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
        
        $this->addElement($tendonxuat)
             ->addElement($ngayxuat)
             ->addElement($them)
             ;
        
    }
}