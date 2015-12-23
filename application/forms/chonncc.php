<?php
class Form_Chonncc extends Zend_Form{
    public function init(){

        $this->setDisableLoadDefaultDecorators(true);
    
        $this->setDecorators(array(
            array('ViewScript', array('viewScript' =>'formnoindex/chonncc_layout.phtml')),
            'Form'
        ));

        $data = new My_Data();
        $opNCC= $data->getOptionNCC();
    
        $nhacungcap = $this->createElement('select', 'manhacungcap', array('multioptions'=>$opNCC,'decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chọn'));
    
        $nhacungcap->setAttrib('class', 'formEdit');//->setValue($khohang[0]['MaKho']);
        $this->addElement($nhacungcap)
        ->addElement($them)
        ;
    }
}