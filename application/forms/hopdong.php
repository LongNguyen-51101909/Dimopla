<?php
class Form_Hopdong extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/hopdong_layout.phtml')),
                'Form'
        ));
//         $data = new My_Data();
//         $opMau = $data->getOptionMau();
//         $opLoaiVai = $data->getOptionLoaiVai();
//         $opNCC= $data->getOptionNCC();       
        
        $tenhopdong= $this->createElement('text', 'tenhopdong', array('decorators' => array('ViewHelper'),));
        $mota = $this->createElement('text', 'mota', array('decorators' => array('ViewHelper'),));
        $ngayky = $this->createElement('text', 'ngayky', array('decorators' => array('ViewHelper'),'data-type' => 'date'));
        $sotansoi = $this->createElement('text', 'sotansoi', array('decorators' => array('ViewHelper'),));
        $thanhtien = $this->createElement('text', 'thanhtien', array('decorators' => array('ViewHelper'),));
        $mamau = $this->createElement('text', 'mamau', array('decorators' => array('ViewHelper'),));
        $madonhang = $this->createElement('text', 'madonhang', array('decorators' => array('ViewHelper'),));
        $maloaivai = $this->createElement('text', 'maloaivai', array('decorators' => array('ViewHelper'),));
        $manhacungcap = $this->createElement('text', 'manhacungcap', array('decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
//         $registry = $this->createElement('submit', 'logout', array('decorators' => array('ViewHelper'),'label'=>'Ä�Äƒng KÃ½'));
        
        /* $username->setAttrib('class', 'form-control');
        $password->setAttrib('class', 'form-control');        
        $login->setAttrib('class', 'btn btn-primary'); 
        $registry->setAttrib('class', 'btn btn-default'); */
        
        $this->addElement($tenhopdong)
             ->addElement($mota)
             ->addElement($ngayky)
             ->addElement($sotansoi)
             ->addElement($thanhtien)
             ->addElement($mamau)
             ->addElement($madonhang)
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