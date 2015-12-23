<?php
class Form_Khachhang extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/khachhang_layout.phtml')),
                'Form'
        ));
        
        $ten= $this->createElement('text', 'ten', array('decorators' => array('ViewHelper'),));
        $sdt = $this->createElement('text', 'sdt', array('decorators' => array('ViewHelper'),));
        $diachi =  $this->createElement('text', 'diachi', array('decorators' => array('ViewHelper'),));
        $them = $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
        
//         $ten->setAttrib('class', 'form-control');
//         $sdt->setAttrib('class', 'form-control');        
//         $diachi->setAttrib('class', 'btn btn-primary'); 
//         $fax->setAttrib('class', 'btn btn-default');
//         $no->setAttrib('class', 'btn btn-default');
        
        $this->addElement($ten)
             ->addElement($sdt)
             ->addElement($diachi)
             ->addElement($them);
        
//         $this->addElement('submit', 'nhap', array(
//                 'decorators' => array(
//                         'ViewHelper'
//                 ),
//                 'label' => 'Nháº­p'
//         ));
        
    }
}