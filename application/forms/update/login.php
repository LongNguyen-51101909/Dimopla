<?php
class Form_Login extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/login_layout.phtml')),
                'Form'
        ));
        
        $username= $this->createElement('text', 'username', array('decorators' => array('ViewHelper'),));
        $password = $this->createElement('password', 'password', array('decorators' => array('ViewHelper'),));
        $login =  $this->createElement('submit', 'submit', array('decorators' => array('ViewHelper'),'label'=>'Đăng Nhập'));
        
        $username->setAttrib('class', 'form-control');
        $password->setAttrib('class', 'form-control');        
        $login->setAttrib('class', 'btn btn-primary'); 
        
        $this->addElement($username)
             ->addElement($password)
             ->addElement($login);
        
//         $this->addElement('submit', 'nhap', array(
//                 'decorators' => array(
//                         'ViewHelper'
//                 ),
//                 'label' => 'Nháº­p'
//         ));
        
    }
}