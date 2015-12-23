<?php
class Form_Formmoi_Caythanhpham extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'formmoi/caythanhpham_layout.phtml')),
                'Form'
        ));
        
        $sometvai = $this->createElement('text', 'sometvai', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
         
        
        $this->addElement($sometvai)
             ->addElement($them)
             ;
        
    }
}