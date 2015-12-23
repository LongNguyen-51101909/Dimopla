<?php
class Form_Update_Loaisoi extends Zend_Form{
    public function init(){
        
    }
    
    public function createForm($id_loaisoi)
    {
        $ls = new Model_Loaisoi();
        $loaisoi = $ls->getWhere($id_loaisoi);
    
        $this->setDisableLoadDefaultDecorators(true);
    
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/loaisoi_layout.phtml')),
                'Form'
        ));
    
        $tenloaisoi= $this->createElement('text', 'tenloaisoi', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chỉnh Sửa'));
        
        $tenloaisoi->setAttrib('class', 'formEdit')->setValue($loaisoi['TenSoi']);
        
        $this->addElement($tenloaisoi)
             ->addElement($them)
             ;
    }
}