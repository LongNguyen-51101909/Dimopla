<?php
class Form_Update_Lonhuom extends Zend_Form{
    public function createLonhuom(){
        
    }
    
    public function createForm($id_lonhuom)
    {
        $kh = new Model_Lonhuom();
        $lonhuom = $kh->getWhere($id_lonhuom);
    
        $this->setDisableLoadDefaultDecorators(true);
    
        $this->setDecorators(array(
            array('ViewScript', array('viewScript' =>'form/lonhuom_layout.phtml')),
            'Form'
        ));
        $data = new My_Data();
        $opMau = $data->getOptionMau();
        $tenlonhuom= $this->createElement('text', 'tenlonhuom', array('decorators' => array('ViewHelper'),));
        $ngaynhuom = $this->createElement('text', 'ngaynhuom', array('decorators' => array('ViewHelper'),'data-type' => 'date'));
        $mamau = $this->createElement('select', 'mamau', array('decorators' => array('ViewHelper'),'multioptions'=>$opMau));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chỉnh sửa'));
        
        $mydate = Zend_Locale_Format::getDate($lonhuom[0]['NgayNhuom'],array("date_format"=>"yyyy.MM.dd"));
        $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
        
        $tenlonhuom->setAttrib('class', 'formEdit')->setValue($lonhuom[0]['TenLoNhuom']);
        $ngaynhuom->setAttrib('class', 'formEdit')->setValue($date_str);
        $mamau->setAttrib('class', 'formEdit')->setValue($lonhuom[0]['MaMau']);
        
        $this->addElement($tenlonhuom)
             ->addElement($ngaynhuom)
             ->addElement($mamau)
             ->addElement($them)
             ;
    }
}