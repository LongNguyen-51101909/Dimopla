<?php
class Form_Update_Nhacungcap extends Zend_Form{
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
        
        $this->addElement($ten)
             ->addElement($sdt)
             ->addElement($diachi)
             ->addElement($fax)
             ->addElement($no)
             ->addElement($them);
        
    }
    
    public function createForm($id_ncc)
    {
        $ncc = new Model_Nhacungcap();
        $nhacungcap = $ncc->getWhere($id_ncc);
    
        $this->setDisableLoadDefaultDecorators(true);
    
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'formnoindex/nhacungcap_layout.phtml')),
                'Form'
        ));
   
    
        $ten= $this->createElement('text', 'ten', array('decorators' => array('ViewHelper'),'label'=>'Tên Nhà Cung Cấp'));
        $sdt = $this->createElement('text', 'sdt', array('decorators' => array('ViewHelper'),'label'=>'Số Điện Thoại'));
        $diachi =  $this->createElement('text', 'diachi', array('decorators' => array('ViewHelper'),'label'=>'Địa Chỉ'));
        $fax = $this->createElement('text', 'fax', array('decorators' => array('ViewHelper'),'label'=>'Fax'));
        $no = $this->createElement('text', 'no', array('decorators' => array('ViewHelper'),'label'=>'Nợ'));
        $them = $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chỉnh Sửa'));
        
        $ten->setAttrib('class', 'formEdit')->setValue($nhacungcap['TenNhaCungCap']);
        $sdt->setAttrib('class', 'formEdit')->setValue($nhacungcap['Sdt']);
        $diachi->setAttrib('class', 'formEdit')->setValue($nhacungcap['DiaChi']);
        $fax->setAttrib('class', 'formEdit')->setValue($nhacungcap['Fax']);
        
        $this->addElement($ten)
             ->addElement($sdt)
             ->addElement($diachi)
             ->addElement($fax)
             ->addElement($them);

    }
}