<?php
class Form_Update_Caythanhpham extends Zend_Form{
    public function init(){
        
    }
    
    public function createForm($id_ctp)
    {
        $ctp = new Model_Caythanhpham();
        $caytp= $ctp->getWhere($id_ctp);
    
        $this->setDisableLoadDefaultDecorators(true);
    
         $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'formnoindex/caythanhpham_layout.phtml')),
                'Form'
        ));
         
         $tenctp= $this->createElement('text', 'TenCTP', array('decorators' => array('ViewHelper'),));
         $sometvai = $this->createElement('text', 'sometvai', array('decorators' => array('ViewHelper'),));
         $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chỉnh sửa'));
          
         $tenctp->setAttrib('class', 'formEdit')->setValue($caytp[0]['TenCTP']);
         $sometvai->setAttrib('class', 'formEdit')->setValue($caytp[0]['SoMetVai']);
         
         $this->addElement($tenctp)
         ->addElement($sometvai)
         ->addElement($them)
         ;
       
    }
}