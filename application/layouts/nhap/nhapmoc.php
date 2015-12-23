<?php 
    echo $this->headMeta();
    echo $this->headLink();

    
    $mamoc = $this->param->getParam('mamoc');
    
    $caymoc = new Model_Caymoc();
    $caymocrow = $caymoc->getWhere($mamoc);
    
    $updatecm = array('TrangThai'=>1);
    $caymoc->update_data($caymocrow['MaMoc'], $updatecm);

    $khosoi = new Model_Khosoi();
    $khosoirow = $khosoi->getWhere_khohang($caymocrow['MaKho']);
    
    $loaivai = new Model_Loaivai();
    $loaivairow = $loaivai->getWhere($caymocrow['MaVai']);
    
//     $loaisoi = new Model_Loaisoi();
//     $loaisoirow = $loaisoi->getWhere($loaivairow['MaSoi']);
    
    // dung bien flag de kiem tra xem trong kho da co loai soi chua
    $flag = false;
    $row = array();
    if($khosoirow)
    {
        foreach ($khosoirow as $item)
        {
            if($item['MaSoi'] == $loaivairow['MaSoi'])
            {
                $flag = true;
                $update = array('SoTanSoi'=>($item['SoTanSoi'] + $caymocrow['SoKgSoi']/1000));
                 $khosoi->update_data($item['MaKhoSoi'], $update);
                $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                $_redirector->gotoUrl(HOST_PROJECT."/index/xem/caymoc/true");
            }
        }
    }
