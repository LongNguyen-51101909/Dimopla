<?php
class Form_Noindex_Caymoc extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'formnoindex/caymoc_layout.phtml')),
                'Form'
        ));
        
        $data = new My_Data();
        $opLoaiVai = $data->getOptionLoaiVai();
        
        $tencaymoc= $this->createElement('text', 'tencaymoc', array('decorators' => array('ViewHelper'),));
        $sometvai = $this->createElement('text', 'sometvai', array('decorators' => array('ViewHelper'),));
        //$maloaivai = $this->createElement('text', 'maloaivai', array('decorators' => array('ViewHelper'),));
        $maloaivai = $this->createElement('select', 'maloaivai', array('multioptions'=>$opLoaiVai,'decorators' => array('ViewHelper'),));
//        $mahopdong = $this->createElement('text', 'mahopdong', array('decorators' => array('ViewHelper'),));
        //$malonhuom = $this->createElement('text', 'malonhuom', array('decorators' => array('ViewHelper'),));
        $soluong = $this->createElement('text', 'soluong', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
        
        $maloaivai->setAttrib('class', 'formEdit');
        
        
        $this->addElement($tencaymoc)
             ->addElement($sometvai)
             ->addElement($maloaivai)
//             ->addElement($mahopdong)
//             ->addElement($malonhuom)
             ->addElement($soluong)
             ->addElement($them)
             ;        
    }
}