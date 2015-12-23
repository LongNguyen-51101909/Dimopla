<?php
class Form_Update_Hopdong extends Zend_Form{
    public function init(){
        
    }
    
    public function createForm($id_hopdong)
    {
        $kh = new Model_Hopdong();
        $hopdong = $kh->getWhereIdHopDong($id_hopdong);
    
        $this->setDisableLoadDefaultDecorators(true);
    
        $this->setDecorators(array(
                array('ViewScript', array('viewScript' =>'formnoindex/hopdong_layout.phtml')),
                'Form'
        ));
    
        $data = new My_Data();
        $opMau = $data->getOptionMau();
        $opLoaiVai = $data->getOptionLoaiVai();
        $opNCC= $data->getOptionNCC();
        
        $tenhopdong= $this->createElement('text', 'tenhopdong', array('decorators' => array('ViewHelper'),));
        $mota = $this->createElement('text', 'mota', array('decorators' => array('ViewHelper'),));
        $ngayky = $this->createElement('text', 'ngayky', array('decorators' => array('ViewHelper'),));
        $sotansoi = $this->createElement('text', 'sotansoi', array('decorators' => array('ViewHelper'),));
        $thanhtien = $this->createElement('text', 'thanhtien', array('decorators' => array('ViewHelper'),));
        $mamau = $this->createElement('select', 'mamau', array('multioptions'=>$opMau,'decorators' => array('ViewHelper'),));
        $maloaivai = $this->createElement('select', 'maloaivai', array('multioptions'=>$opLoaiVai,'decorators' => array('ViewHelper'),));
        $manhacungcap = $this->createElement('select', 'manhacungcap', array('multioptions'=>$opNCC,'decorators' => array('ViewHelper'),));
        $them =  $this->createElement('submit', 'them', array('decorators' => array('ViewHelper'),'label'=>'Chỉnh sửa'));

        $mydate = Zend_Locale_Format::getDate($hopdong['NgayKy'],array("date_format"=>"yyyy.MM.dd"));
        $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
        
        $tenhopdong->setAttrib('class', 'formEdit')->setValue($hopdong['TenHopDong']);
        $mota->setAttrib('class', 'formEdit')->setValue($hopdong['MoTa']);
        $ngayky->setAttrib('class', 'formEdit')->setValue($date_str);
        $sotansoi->setAttrib('class', 'formEdit')->setValue($hopdong['SoTanSoi']);
        $thanhtien->setAttrib('class', 'formEdit')->setValue($hopdong['ThanhTien']);
        $mamau->setAttrib('class', 'formEdit')->setValue($hopdong['MaMau']);
        $maloaivai->setAttrib('class', 'formEdit')->setValue($hopdong['MaLoaiVai']);
        $manhacungcap->setAttrib('class', 'formEdit')->setValue($hopdong['MaNhaCungCap']);
        
        
        $this->addElement($tenhopdong)
        ->addElement($mota)
        ->addElement($ngayky)
        ->addElement($sotansoi)
        ->addElement($thanhtien)
        ->addElement($mamau)
        ->addElement($maloaivai)
        ->addElement($manhacungcap)
        ->addElement($them)
        ;
        
    }
}