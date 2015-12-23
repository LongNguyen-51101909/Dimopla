<?php
class Form_Noindex_Caythanhpham extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'formnoindex/caythanhpham_layout.phtml')),
                'Form'
        ));
        
        $tenctp= $this->createElement('text', 'TenCTP', array('decorators' => array('ViewHelper'),));
        $sometvai = $this->createElement('text', 'sometvai', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
         
        
        $this->addElement($tenctp)
             ->addElement($sometvai)
             ->addElement($them)
             ;
        
    }
}