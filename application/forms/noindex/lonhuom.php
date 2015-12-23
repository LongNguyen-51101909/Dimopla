<?php
class Form_Noindex_Lonhuom extends Zend_Form{
    public function createLonhuom($opMau){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/lonhuom_layout.phtml')),
                'Form'
        ));
        
        $tenlonhuom= $this->createElement('text', 'tenlonhuom', array('decorators' => array('ViewHelper'),));
        $ngaynhuom = $this->createElement('text', 'ngaynhuom', array('decorators' => array('ViewHelper'),'data-type' => 'date'));
        $mamau = $this->createElement('select', 'mamau', array('decorators' => array('ViewHelper'),'multioptions'=>$opMau));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
        
        $mamau->setAttrib('class', 'formEdit');
        
        $this->addElement($tenlonhuom)
             ->addElement($ngaynhuom)
             ->addElement($mamau)
             ->addElement($them)
             ;
    }
}