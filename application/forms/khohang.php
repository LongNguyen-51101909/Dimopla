<?php
class Form_Khohang extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/khohang_layout.phtml')),
                'Form'
        ));
        
        $data = new My_Data();
        $op = $data->getOpKhoHang();
        $tenkhohang= $this->createElement('text', 'tenkhohang', array('decorators' => array('ViewHelper'),));
        $diachi = $this->createElement('text', 'diachi', array('decorators' => array('ViewHelper'),));
        $sdt = $this->createElement('text', 'sdt', array('decorators' => array('ViewHelper'),));
        $loaikho = $this->createElement('select', 'loaikho', array('multioptions'=>$op,'decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
        
        $loaikho->setAttrib('class', 'formEdit');
        
        $this->addElement($tenkhohang)
             ->addElement($diachi)
             ->addElement($sdt)
             ->addElement($loaikho)
             ->addElement($them)
             ;        
    }
}