<?php
class Form_Caymoc extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/caymoc_layout.phtml')),
                'Form'
        ));
        
        $tencaymoc= $this->createElement('text', 'tencaymoc', array('decorators' => array('ViewHelper'),));
        $sometvai = $this->createElement('text', 'sometvai', array('decorators' => array('ViewHelper'),));
        $maloaivai = $this->createElement('text', 'maloaivai', array('decorators' => array('ViewHelper'),));
        $mahopdong = $this->createElement('text', 'mahopdong', array('decorators' => array('ViewHelper'),));
        $malonhuom = $this->createElement('text', 'malonhuom', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
//         $registry = $this->createElement('submit', 'logout', array('decorators' => array('ViewHelper'),'label'=>'Ä�Äƒng KÃ½'));
        
        /* $username->setAttrib('class', 'form-control');
        $password->setAttrib('class', 'form-control');        
        $login->setAttrib('class', 'btn btn-primary'); 
        $registry->setAttrib('class', 'btn btn-default'); */
        
        $this->addElement($tencaymoc)
             ->addElement($sometvai)
             ->addElement($maloaivai)
             ->addElement($mahopdong)
             ->addElement($malonhuom)
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