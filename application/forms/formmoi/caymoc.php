<?php
class Form_Formmoi_Caymoc extends Zend_Form{
    public function init(){
       
    }
    
    public function createForm($idkhosoi)
    {
        $ks = new Model_Khosoi();
        $khosoirow = $ks->getWhere($idkhosoi);
    
        $this->setDisableLoadDefaultDecorators(true);
        
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'formmoi/caymoc_layout.phtml')),
                'Form'
        ));
    
        $data = new My_Data();
        $loaisoi = new Model_Loaisoi();
        $loaisoirow = $loaisoi->getWhere($khosoirow['MaSoi']);
        
        $kho= new Model_Khohang();
        $khohang = $kho->getWhere($khosoirow['MaKho']);

        $opvai = $data->getOpLoaiVaiWithIdSoi($khosoirow['MaSoi']);

        $khosoi = $this->createElement('text', 'makho', array('decorators' => array('ViewHelper'),));
        $loaisoi = $this->createElement('text', 'masoi', array('decorators' => array('ViewHelper'),));
        $sokgsoi = $this->createElement('text', 'sokgsoi', array('decorators' => array('ViewHelper'),));
        $loaivai = $this->createElement('select', 'mavai', array('multioptions'=>$opvai,'decorators' => array('ViewHelper'),));
        $sometvai = $this->createElement('text', 'sometvai', array('decorators' => array('ViewHelper'),));
        
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Thêm'));
        
        $khosoi->setAttrib('class', 'formEdit')->setValue($khohang['TenKho']);
        $loaisoi->setAttrib('class', 'formEdit')->setValue($loaisoirow['TenSoi']);
        $loaivai->setAttrib('class', 'formEdit')->setAttrib('id', 'idvai');
        $sokgsoi->setAttrib('class', 'smallfield');        
        $sometvai->setAttrib('class', 'formEdit'); 
        
        
        $this->addElement($loaisoi)
             ->addElement($loaivai)
             ->addElement($sometvai)
             ->addElement($sokgsoi)
             ->addElement($khosoi)
             ->addElement($them)
             ;        
    }
}
