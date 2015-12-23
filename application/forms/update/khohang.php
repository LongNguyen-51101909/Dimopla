<?php
class Form_Update_Khohang extends Zend_Form{
    public function init(){
        
    }
    
    public function createForm($id_kho)
    {
        $kho = new Model_Khohang();
        $khohang= $kho->getWhere($id_kho);
    
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
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chỉnh Sửa'));
        
        $tenkhohang->setAttrib('class', 'formEdit')->setValue($khohang[0]['TenKho']);
        $diachi->setAttrib('class', 'formEdit')->setValue($khohang[0]['Diachi']);
        $sdt->setAttrib('class', 'formEdit')->setValue($khohang[0]['sdt']);
        $loaikho->setAttrib('class', 'formEdit')->setValue($khohang[0]['MaLoaiKho']);
        
        $this->addElement($tenkhohang)
        ->addElement($diachi)
        ->addElement($sdt)
        ->addElement($loaikho)
        ->addElement($them)
        ;
        
    }
}