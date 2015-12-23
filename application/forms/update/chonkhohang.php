<?php
class Form_Update_ChonKhoHang extends Zend_Form{
    public function init(){

    }
    public function createForm($id_kho)
    {
        $kho = new Model_Khohang();
        $khohang= $kho->getWhere($id_kho);

        $this->setDisableLoadDefaultDecorators(true);
    
        $this->setDecorators(array(
            array('ViewScript', array('viewScript' =>'formnoindex/chonkhohang_layout.phtml')),
            'Form'
        ));
         
        $data = new My_Data();
        $opKhoHang = $data->getOptionKhoHang();
    
        $chonkhohang= $this->createElement('select', 'khohang', array('multioptions'=>$opKhoHang,'decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chọn'));
    
        $chonkhohang->setAttrib('class', 'formEdit')->setValue($khohang[0]['MaKho']);
        $this->addElement($chonkhohang)
        ->addElement($them)
        ;
    }
}