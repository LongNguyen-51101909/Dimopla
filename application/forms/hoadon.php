<?php
class Form_Hoadon extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/hoadon_layout.phtml')),
                'Form'
        ));
        
        $sotien= $this->createElement('text', 'sotien', array('decorators' => array('ViewHelper'),));
        $ngaythanhtoan = $this->createElement('text', 'ngaythanhtoan', array('decorators' => array('ViewHelper'),'data-type' => 'date'));
        $hinhthucthanhtoan = $this->createElement('text', 'hinhthucthanhtoan', array('decorators' => array('ViewHelper'),));
        $nhacungcap = $this->createElement('text', 'nhacungcap', array('decorators' => array('ViewHelper'),));
       
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
//         $registry = $this->createElement('submit', 'logout', array('decorators' => array('ViewHelper'),'label'=>'Ä�Äƒng KÃ½'));
        
        /* $username->setAttrib('class', 'form-control');
        $password->setAttrib('class', 'form-control');        
        $login->setAttrib('class', 'btn btn-primary'); 
        $registry->setAttrib('class', 'btn btn-default'); */
        
        $this->addElement($sotien)
             ->addElement($ngaythanhtoan)
             ->addElement($hinhthucthanhtoan)
             ->addElement($nhacungcap)
            
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