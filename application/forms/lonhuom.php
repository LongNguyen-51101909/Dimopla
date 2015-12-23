<?php
class Form_Lonhuom extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/lonhuom_layout.phtml')),
                'Form'
        ));
        
        $tenlonhuom= $this->createElement('text', 'tenlonhuom', array('decorators' => array('ViewHelper'),));
        $ngaynhuom = $this->createElement('text', 'ngaynhuom', array('decorators' => array('ViewHelper'),));
        $mamau = $this->createElement('text', 'mamau', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
//         $registry = $this->createElement('submit', 'logout', array('decorators' => array('ViewHelper'),'label'=>'Ä�Äƒng KÃ½'));
        
        /* $username->setAttrib('class', 'form-control');
        $password->setAttrib('class', 'form-control');        
        $login->setAttrib('class', 'btn btn-primary'); 
        $registry->setAttrib('class', 'btn btn-default'); */
        
        $this->addElement($tenlonhuom)
             ->addElement($ngaynhuom)
             ->addElement($mamau)
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