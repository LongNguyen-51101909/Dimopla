<?php
class Form_Noindex_ChonKhoHang extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'formnoindex/chonkhohang_layout.phtml')),
                'Form'
        ));
        
        $data = new My_Data();
        $opKhoHang = $data->getOptionKhoHang();
        
        $chonkhohang= $this->createElement('select', 'chonkhohang', array('multioptions'=>$opKhoHang,'decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chọn'));
        
        $chonkhohang->setAttrib('class', 'formEdit');
        
        $this->addElement($chonkhohang)
             ->addElement($them)
             ;        
    }
}