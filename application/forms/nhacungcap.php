<?php
class Form_Nhacungcap extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/nhacungcap_layout.phtml')),
                'Form'
        ));
        
        $ten= $this->createElement('text', 'ten', array('decorators' => array('ViewHelper'),'label'=>'Tên Nhà Cung Cấp'));
        $sdt = $this->createElement('text', 'sdt', array('decorators' => array('ViewHelper'),'label'=>'Số Điện Thoại'));
        $diachi =  $this->createElement('text', 'diachi', array('decorators' => array('ViewHelper'),'label'=>'Địa Chỉ'));
        $fax = $this->createElement('text', 'fax', array('decorators' => array('ViewHelper'),'label'=>'Fax'));
        $no = $this->createElement('text', 'no', array('decorators' => array('ViewHelper'),'label'=>'Nợ'));
        $them = $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
        
//         $ten->setAttrib('class', 'form-control');
//         $sdt->setAttrib('class', 'form-control');        
//         $diachi->setAttrib('class', 'btn btn-primary'); 
//         $fax->setAttrib('class', 'btn btn-default');
//         $no->setAttrib('class', 'btn btn-default');
        
        $this->addElement($ten)
             ->addElement($sdt)
             ->addElement($diachi)
             ->addElement($fax)
             ->addElement($no)
             ->addElement($them);
        
//         $this->addElement('submit', 'nhap', array(
//                 'decorators' => array(
//                         'ViewHelper'
//                 ),
//                 'label' => 'Nháº­p'
//         ));
        
    }
}