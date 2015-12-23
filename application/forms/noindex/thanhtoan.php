<?php
class Form_Noindex_Thanhtoan extends Zend_Form{
    public function init(){
        
    }
    
    public function createForm($mancc)
    {
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
            array('ViewScript', array('viewScript' =>'formnoindex/thanhtoan_layout.phtml')),
            'Form'
        ));
        
        $ncc = new Model_Nhacungcap();
        $nhacc = $ncc->getWhere($mancc);
        $tk = new Model_Taikhoan();
        $taikhoan = $tk->getRow();
        
        $data = new My_Data();
        $sodutem = $data->convertCurrency($taikhoan['SoDu']);
        $tiennotem = $data->convertCurrency($nhacc['No']);
        $opHinhthuc = $data->getOpHinhThuc();
        
        $tenncc = $this->createElement('text', 'tenncc', array('decorators' => array('ViewHelper'),));
        $tienno = $this->createElement('text', 'tienno', array('decorators' => array('ViewHelper'),));
        $sodu = $this->createElement('text', 'sodu', array('decorators' => array('ViewHelper'),));
        $tenhoadon= $this->createElement('text', 'tenhoadon', array('decorators' => array('ViewHelper'),));
        $tienthanhtoan = $this->createElement('text', 'tienthanhtoan', array('decorators' => array('ViewHelper'),));
        $nhacungcap = $this->createElement('hidden', 'mancc', array('use_hidden_element' => true,'decorators' => array('ViewHelper'),));
        $ngay = $this->createElement('text', 'ngaythanhtoan', array('decorators' => array('ViewHelper'),'data-type' => 'date'));
        $hinhthuc = $this->createElement('select', 'hinhthuc', array('multioptions'=>$opHinhthuc,'decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thanh Toán'));
        
        
        $tenncc->setAttrib('class', 'formEdit')->setValue($nhacc['TenNhaCungCap'])->setAttrib('disabled', 'disabled');
        $tienno->setAttrib('class', 'formEdit')->setValue($tiennotem)->setAttrib('disabled', 'disabled');
        $sodu->setAttrib('class', 'formEdit')->setValue($sodutem)->setAttrib('disabled', 'disabled');
        $nhacungcap->setAttrib('class', 'formEdit')->setValue($mancc);
        $tienthanhtoan->setAttrib('class', 'formEdit');
        $hinhthuc->setAttrib('class', 'formEdit');
        
        $this->addElement($tenncc)
        ->addElement($tienno)
        ->addElement($sodu)
        ->addElement($tenhoadon)
        ->addElement($tienthanhtoan)
        ->addElement($nhacungcap)
        ->addElement($ngay)
        ->addElement($hinhthuc)
        ->addElement($them)
        ;
    }
}