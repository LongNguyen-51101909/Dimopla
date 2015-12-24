<?php

class Form_Searchs_Caymoc extends Zend_Form
{

    public function init()
    {
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
            array(
                'ViewScript',
                array(
                    'viewScript' => 'Searchs/caymoc.phtml'
                )
            ),
            'Form'
        ));
        
        $data = new My_Data();
        // $opKhoHang = $data->getOpKhoSoi();
        
        // $chonkhohang->setAttrib('class', 'formEdit')->setValue($khohang[0]['MaKho']);
        
        // $khohang= $this->createElement('select', 'caymoc', array('multioptions'=>$opKhoHang,'decorators' => array('ViewHelper'),));
        $caymoctim = $this->createElement('text', 'caymoctim', array(
            'decorators' => array(
                'ViewHelper'
            )
        ));
        $them = $this->createElement('submit', 'them', array(
            'decorators' => array(
                'ViewHelper'
            ),
            'label' => 'Chọn'
        ));
        
        $caymoctim->setAttrib('class', 'formEdit');
        
        $this->addElement($caymoctim)->addElement($them);
    }
}