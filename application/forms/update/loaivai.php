<?php
class Form_Update_Loaivai extends Zend_Form{
    public function init(){
        
    }
    
    public function createForm($id_loaivai)
    {
        $lv = new Model_Loaivai();
        $loaivai = $lv->getWhere($id_loaivai);
    
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
        
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chỉnh Sửa'));
        
        
        $tenloaivai->setAttrib('class', 'formEdit')->setValue($loaivai['TenLoaiVai']);
        $masoi->setAttrib('class', 'formEdit')->setValue($loaivai['MaSoi']);
        
        $this->addElement($tenloaivai)
             ->addElement($masoi)
             ->addElement($them)
             ;        
    }
}