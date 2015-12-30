<?php
class Form_Searchs_Donhang extends Zend_Form {
    public function init(){

        $this->setDisableLoadDefaultDecorators(true);

        $this->setDecorators(array(
            array('ViewScript', array('viewScript' =>'Searchs/donhang.phtml')),
            'Form'
        ));

        $data = new My_Data();
        
        $key = $this->createElement('text', 'key', array('decorators' => array('ViewHelper'),'value' => $_POST["key"]));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chọn'));

        $key->setAttrib('class', 'formEdit');

        $this->addElement($key)
        ->addElement($them)
        ;
    }
}