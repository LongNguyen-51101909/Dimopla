<?php
class Form_Update_Mau extends Zend_Form{
    public function init(){
        
        
    }
    public function createForm($id_mau)
    {
        $ls = new Model_Mau();
        $mau = $ls->getWhereIdMau($id_mau);
    
        $this->setDisableLoadDefaultDecorators(true);
    
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/mau_layout.phtml')),
                'Form'
        ));
    
        $tenmau= $this->createElement('text', 'tenmau', array('decorators' => array('ViewHelper'),));
        $congthuc = $this->createElement('text', 'congthuc', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chỉnh Sửa'));
        
        $tenmau->setAttrib('class', 'formEdit')->setValue($mau['TenMau']);
        $congthuc->setAttrib('class', 'formEdit')->setValue($mau['CongThuc']);
        
        $this->addElement($tenmau)
             ->addElement($congthuc)
             ->addElement($them)
             ;
    }
}