<?php
class Form_Caythanhpham extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/caythanhpham_layout.phtml')),
                'Form'
        ));
        
        $tenctp= $this->createElement('text', 'caythanhpham', array('decorators' => array('ViewHelper'),));
        $sometvai = $this->createElement('text', 'sometvai', array('decorators' => array('ViewHelper'),));
        $loaivai = $this->createElement('text', 'loaivai', array('decorators' => array('ViewHelper'),));
        $tucaymoc = $this->createElement('text', 'tucaymoc', array('decorators' => array('ViewHelper'),));
        $thuoclonhuom = $this->createElement('text', 'thuoclonhuom', array('decorators' => array('ViewHelper'),));
        $thuockho = $this->createElement('text', 'thuockho', array('decorators' => array('ViewHelper'),));
        $donxuat = $this->createElement('text', 'donxuat', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
//         $registry = $this->createElement('submit', 'logout', array('decorators' => array('ViewHelper'),'label'=>'Ä�Äƒng KÃ½'));
        
        /* $username->setAttrib('class', 'form-control');
        $password->setAttrib('class', 'form-control');        
        $login->setAttrib('class', 'btn btn-primary'); 
        $registry->setAttrib('class', 'btn btn-default'); */
        
        $this->addElement($tenctp)
             ->addElement($sometvai)
             ->addElement($loaivai)
             ->addElement($tucaymoc)
             ->addElement($thuoclonhuom)
             ->addElement($thuockho)
             ->addElement($donxuat)
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