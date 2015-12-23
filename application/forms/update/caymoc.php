<?php
class Form_Update_Caymoc extends Zend_Form{
    public function init(){
        
    }
    
    public function createForm($id_cm)
    {
        $kh = new Model_Caymoc();
        $caymoc = $kh->getWhere($id_cm);

        $this->setDisableLoadDefaultDecorators(true);
    
        $this->setDecorators(array(
            array('ViewScript', array('viewScript' =>'formnoindex/caymoc_layout.phtml')),
            'Form'
        ));
    
        $data = new My_Data();
        $opLoaiVai = $data->getOptionLoaiVai();
        
        $tencaymoc= $this->createElement('text', 'tencaymoc', array('decorators' => array('ViewHelper'),));
        $sometvai = $this->createElement('text', 'sometvai', array('decorators' => array('ViewHelper'),));
        $maloaivai = $this->createElement('select', 'maloaivai', array('multioptions'=>$opLoaiVai,'decorators' => array('ViewHelper'),));
        $soluong = $this->createElement('text', 'soluong', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chỉnh sửa'));
        
        $tencaymoc->setAttrib('class', 'formEdit')->setValue($caymoc['TenCayMoc']);
        $sometvai->setAttrib('class', 'formEdit')->setValue($caymoc['SoMetVai']);
        $maloaivai->setAttrib('class', 'formEdit')->setValue($caymoc['MaLoaiVai']);
        $soluong->setAttrib('class', 'formEdit')->setValue($caymoc['SoLuongCayMoc']);
        
        $this->addElement($tencaymoc)
            ->addElement($sometvai)
            ->addElement($maloaivai)
            ->addElement($soluong)
            ->addElement($them)
            ;
    }
}