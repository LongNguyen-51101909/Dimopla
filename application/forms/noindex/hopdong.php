<?php
class Form_Noindex_Hopdong extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'formnoindex/hopdong_layout.phtml')),
                'Form'
        ));
        
        $data = new My_Data();
        $opMau = $data->getOptionMau();
        $opLoaiVai = $data->getOptionLoaiVai();
        $opNCC= $data->getOptionNCC();
        
        $tenhopdong= $this->createElement('text', 'tenhopdong', array('decorators' => array('ViewHelper'),));
        $mota = $this->createElement('text', 'mota', array('decorators' => array('ViewHelper'),));
        $ngayky = $this->createElement('text', 'ngayky', array('decorators' => array('ViewHelper'),'data-type' => 'date'));
        $sotansoi = $this->createElement('text', 'sotansoi', array('decorators' => array('ViewHelper'),));
        $thanhtien = $this->createElement('text', 'thanhtien', array('decorators' => array('ViewHelper'),));
        $mamau = $this->createElement('select', 'mamau', array('multioptions'=>$opMau,'decorators' => array('ViewHelper'),));
        $maloaivai = $this->createElement('select', 'maloaivai', array('multioptions'=>$opLoaiVai,'decorators' => array('ViewHelper'),));
        $manhacungcap = $this->createElement('select', 'manhacungcap', array('multioptions'=>$opNCC,'decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
//         $registry = $this->createElement('submit', 'logout', array('decorators' => array('ViewHelper'),'label'=>'Ä�Äƒng KÃ½'));
        
        $mamau->setAttrib('class', 'formEdit');
        $maloaivai->setAttrib('class', 'formEdit');        
        $manhacungcap->setAttrib('class', 'formEdit'); 
        
        $this->addElement($tenhopdong)
             ->addElement($mota)
             ->addElement($ngayky)
             ->addElement($sotansoi)
             ->addElement($thanhtien)
             ->addElement($mamau)
             ->addElement($maloaivai)
             ->addElement($manhacungcap)
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