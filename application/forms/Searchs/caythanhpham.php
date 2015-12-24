<?php

class Form_Searchs_Caythanhpham extends Zend_Form
{

    public function init()
    {
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
            array(
                'ViewScript',
                array(
                    'viewScript' => 'Searchs/caythanhpham.phtml'
                )
            ),
            'Form'
        ));
        
        $data = new My_Data();
        // $opKhoHang = $data->getOpKhoSoi();
        
        // $chonkhohang->setAttrib('class', 'formEdit')->setValue($khohang[0]['MaKho']);
        
        // $khohang= $this->createElement('select', 'caythanhpham', array('multioptions'=>$opKhoHang,'decorators' => array('ViewHelper'),));
        $caythanhphamtim = $this->createElement('text', 'caythanhphamtim', array(
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
        
        $caythanhphamtim->setAttrib('class', 'formEdit');
        
        $this->addElement($caythanhphamtim)->addElement($them);
    }
}