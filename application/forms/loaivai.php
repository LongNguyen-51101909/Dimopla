<?php
class Form_Loaivai extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/loaivai_layout.phtml')),
                'Form'
        ));
        $ls= new Model_Loaisoi();
        $arr = $ls->getAll();
        $options = array();
        foreach ($arr as $item)
        {
            $name = $item['MaSoi'];
            $options[$name] = $item['TenSoi'];
        }

        $tenloaivai= $this->createElement('text', 'tenloaivai', array('decorators' => array('ViewHelper'),));
        $masoi = $this->createElement('select', 'masoi',array('multioptions'=>$options,'decorators' => array('ViewHelper'),));
        
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
        
        $masoi->setAttrib('class', 'formEdit');
        
        $this->addElement($tenloaivai)
             ->addElement($masoi)
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