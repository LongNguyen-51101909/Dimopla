<?php
class Form_Donhang extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/donhang_layout.phtml')),
                'Form'
        ));
        
        $tendonhang= $this->createElement('text', 'tendonhang', array('decorators' => array('ViewHelper'),));
        $ngaydathang = $this->createElement('text', 'ngaydathang', array('decorators' => array('ViewHelper'),'data-type' => 'date'));
        $tiendathang = $this->createElement('text', 'tiendathang', array('decorators' => array('ViewHelper'),));
        $sometvai = $this->createElement('text', 'sometvai', array('decorators' => array('ViewHelper'),));
        $makhachhang = $this->createElement('text', 'makhachhang', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
//         $registry = $this->createElement('submit', 'logout', array('decorators' => array('ViewHelper'),'label'=>'Ä�Äƒng KÃ½'));
        
        /* $username->setAttrib('class', 'form-control');
        $password->setAttrib('class', 'form-control');        
        $login->setAttrib('class', 'btn btn-primary'); 
        $registry->setAttrib('class', 'btn btn-default'); */
        
        $this->addElement($tendonhang)
             ->addElement($ngaydathang)
             ->addElement($tiendathang)
             ->addElement($sometvai)
             ->addElement($makhachhang)
             ->addElement($them)
             ;
        
//         $this->addElement('submit', 'nhap', array(
//                 'decorators' => array(
//                         'ViewHelper'
//                 ),
//                 'label' => 'NhÃ¡ÂºÂ­p'
//         ));
        
    }
}