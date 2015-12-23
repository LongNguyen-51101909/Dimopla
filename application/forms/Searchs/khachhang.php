<?php
class Form_Searchs_Khachhang extends Zend_Form {
    public function init(){

        $this->setDisableLoadDefaultDecorators(true);

        $this->setDecorators(array(
            array('ViewScript', array('viewScript' =>'Searchs/khachhang.phtml')),
            'Form'
        ));

        $data = new My_Data();
//         $opKhoHang = $data->getOpKhoSoi();

        //$chonkhohang->setAttrib('class', 'formEdit')->setValue($khohang[0]['MaKho']);

//         $khohang= $this->createElement('select', 'khachhang', array('multioptions'=>$opKhoHang,'decorators' => array('ViewHelper'),));
        $khachhangtim= $this->createElement('text', 'khachhangtim', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chọn'));

        $khachhangtim->setAttrib('class', 'formEdit');

        $this->addElement($khachhangtim)
        ->addElement($them)
        ;
    }
}