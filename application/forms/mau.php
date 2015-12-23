<?php
class Form_Mau extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/mau_layout.phtml')),
                'Form'
        ));
        
        $tenmau= $this->createElement('text', 'tenmau', array('decorators' => array('ViewHelper'),));
        $congthuc = $this->createElement('text', 'congthuc', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
//         $registry = $this->createElement('submit', 'logout', array('decorators' => array('ViewHelper'),'label'=>'Ä�Äƒng KÃ½'));
        
        /* $username->setAttrib('class', 'form-control');
        $password->setAttrib('class', 'form-control');        
        $login->setAttrib('class', 'btn btn-primary'); 
        $registry->setAttrib('class', 'btn btn-default'); */
        
        $this->addElement($tenmau)
             ->addElement($congthuc)
             ->addElement($them)
             ;
        
//         $this->addElement('submit', 'nhap', array(
//                 'decorators' => array(
//                         'ViewHelper'
//                 ),
//                 'label' => 'NhÃ¡ÂºÂ­p'
//         ));
        
    }
}