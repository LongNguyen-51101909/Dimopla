<?php
class Form_Quanlykho extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/quanlykho_layout.phtml')),
                'Form'
        ));
        
        $data = new My_Data();
        $opKhoHang = $data->getOptionKhoHang();
        
        //$chonkhohang->setAttrib('class', 'formEdit')->setValue($khohang[0]['MaKho']);
        
        $khohang= $this->createElement('select', 'mykhohang', array('multioptions'=>$opKhoHang,'decorators' => array('ViewHelper'),));
        
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chọn'));
        
        $khohang->setAttrib('class', 'formEdit');
        
        $this->addElement($khohang)
             ->addElement($them)
             ;
    }
}