<?php
class Form_Update_Donhang extends Zend_Form{
    public function init(){
        
    }
    public function createForm($id_donhang)
    {
        $kh = new Model_Donhang();
        $donhang = $kh->getWhere($id_donhang);
    
       $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'formnoindex/donhang_layout.phtml')),
                'Form'
        ));
        
        $tendonhang= $this->createElement('text', 'tendonhang', array('decorators' => array('ViewHelper'),));
        $ngaydathang = $this->createElement('text', 'ngaydathang', array('decorators' => array('ViewHelper'),'data-type' => 'date'));
        $tiendathang = $this->createElement('text', 'tiendathang', array('decorators' => array('ViewHelper'),));
        $sometvai = $this->createElement('text', 'sometvai', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chỉnh sửa'));

        $tendonhang->setAttrib('class', 'textmedium')
        ->setValue($donhang['TenDonHang']);
        
        $mydate = Zend_Locale_Format::getDate($donhang['NgayDat'],array("date_format"=>"yyyy.MM.dd"));
        $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
        $ngaydathang->setAttrib('class', 'textmedium')
        ->setValue($date_str);
        
        $tiendathang->setAttrib('class', 'textmedium')
        ->setValue($donhang['TienDatHang']);
        $sometvai->setAttrib('class', 'textmedium')
        ->setValue($donhang['SoMetVai']);
        
        $this->addElement($tendonhang)
             ->addElement($ngaydathang)
             ->addElement($tiendathang)
             ->addElement($sometvai)
             ->addElement($them)
             ;
    }
}