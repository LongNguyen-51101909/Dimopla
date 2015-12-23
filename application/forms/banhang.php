<?php
class Form_Banhang extends Zend_Form{
    public function init(){
        
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'form/template_banhang.phtml')),
                'Form'
        ));
        
        $masp1 = $this->createElement('text', 'masp1', array('decorators' => array('ViewHelper'),));
        $size1 = $this->createElement('text', 'size1', array('decorators' => array('ViewHelper'),));
        $soluong1 = $this->createElement('text', 'soluong1', array('decorators' => array('ViewHelper'),));        
        $chietkhau1 = $this->createElement('text', 'chietkhau1', array('decorators' => array('ViewHelper'),));
        
        $masp2 = $this->createElement('text', 'masp2', array('decorators' => array('ViewHelper'),));
        $size2 = $this->createElement('text', 'size2', array('decorators' => array('ViewHelper'),));
        $soluong2 = $this->createElement('text', 'soluong2', array('decorators' => array('ViewHelper'),));        
        $chietkhau2 = $this->createElement('text', 'chietkhau2', array('decorators' => array('ViewHelper'),));
        
        $masp3 = $this->createElement('text', 'masp3', array('decorators' => array('ViewHelper'),));
        $size3 = $this->createElement('text', 'size3', array('decorators' => array('ViewHelper'),));
        $soluong3 = $this->createElement('text', 'soluong3', array('decorators' => array('ViewHelper'),));        
        $chietkhau3 = $this->createElement('text', 'chietkhau3', array('decorators' => array('ViewHelper'),));
        
        $masp4 = $this->createElement('text', 'masp4', array('decorators' => array('ViewHelper'),));
        $size4 = $this->createElement('text', 'size4', array('decorators' => array('ViewHelper'),));
        $soluong4 = $this->createElement('text', 'soluong4', array('decorators' => array('ViewHelper'),));
        $chietkhau4 = $this->createElement('text', 'chietkhau4', array('decorators' => array('ViewHelper'),));
        
        $masp5 = $this->createElement('text', 'masp5', array('decorators' => array('ViewHelper'),));
        $size5 = $this->createElement('text', 'size5', array('decorators' => array('ViewHelper'),));
        $soluong5 = $this->createElement('text', 'soluong5', array('decorators' => array('ViewHelper'),));
        $chietkhau5 = $this->createElement('text', 'chietkhau5', array('decorators' => array('ViewHelper'),));
        
        $masp6 = $this->createElement('text', 'masp6', array('decorators' => array('ViewHelper'),));
        $size6 = $this->createElement('text', 'size6', array('decorators' => array('ViewHelper'),));
        $soluong6 = $this->createElement('text', 'soluong6', array('decorators' => array('ViewHelper'),));
        $chietkhau6 = $this->createElement('text', 'chietkhau6', array('decorators' => array('ViewHelper'),));
        
                
        $masp1->setAttrib('class', 'textdatmua');
        $size1->setAttrib('class', 'textdatmua');
        $soluong1->setAttrib('class', 'textdatmua');        
        $chietkhau1->setAttrib('class', 'textdatmua');
        
        $masp2->setAttrib('class', 'textdatmua');
        $size2->setAttrib('class', 'textdatmua');
        $soluong2->setAttrib('class', 'textdatmua');        
        $chietkhau2->setAttrib('class', 'textdatmua');
        
        $masp3->setAttrib('class', 'textdatmua');
        $size3->setAttrib('class', 'textdatmua');
        $soluong3->setAttrib('class', 'textdatmua');        
        $chietkhau3->setAttrib('class', 'textdatmua');
        
        $masp4->setAttrib('class', 'textdatmua');
        $size4->setAttrib('class', 'textdatmua');
        $soluong4->setAttrib('class', 'textdatmua');
        $chietkhau4->setAttrib('class', 'textdatmua');
        
        $masp5->setAttrib('class', 'textdatmua');
        $size5->setAttrib('class', 'textdatmua');
        $soluong5->setAttrib('class', 'textdatmua');
        $chietkhau5->setAttrib('class', 'textdatmua');
        
        $masp6->setAttrib('class', 'textdatmua');
        $size6->setAttrib('class', 'textdatmua');
        $soluong6->setAttrib('class', 'textdatmua');
        $chietkhau6->setAttrib('class', 'textdatmua');
        
        $this->addElement($masp1)
            ->addElement($soluong1)
            ->addElement($size1)
            ->addElement($chietkhau1)
            ->addElement($masp2)
            ->addElement($soluong2)
            ->addElement($size2)
            ->addElement($chietkhau2)
            ->addElement($masp3)
            ->addElement($soluong3)
            ->addElement($size3)
            ->addElement($chietkhau3)
            ->addElement($masp4)
            ->addElement($soluong4)
            ->addElement($size4)
            ->addElement($chietkhau4)
            ->addElement($masp5)
            ->addElement($soluong5)
            ->addElement($size5)
            ->addElement($chietkhau5)
            ->addElement($masp6)
            ->addElement($soluong6)
            ->addElement($size6)
            ->addElement($chietkhau6);
        $this->addElement('submit', 'nhap', array(
                'decorators' => array(
                        'ViewHelper'
                ),
                'label' => 'Nhập'
        ));
        
    }
}