<?php
class Form_Noindex_Donhang extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'formnoindex/donhang_layout.phtml')),
                'Form'
        ));
        
        $tendonhang= $this->createElement('text', 'tendonhang', array('decorators' => array('ViewHelper'),));
        $ngaydathang = $this->createElement('text', 'ngaydathang', array('decorators' => array('ViewHelper'),'data-type' => 'date'));
        $tiendathang = $this->createElement('text', 'tiendathang', array('decorators' => array('ViewHelper'),));
        $sometvai = $this->createElement('text', 'sometvai', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));

        
        $this->addElement($tendonhang)
             ->addElement($ngaydathang)
             ->addElement($tiendathang)
             ->addElement($sometvai)
             ->addElement($them)
             ;
    }
}