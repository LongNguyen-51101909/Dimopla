<?php 
    echo $this->headMeta();
    echo $this->headLink();

    
    $mahopdong = $this->param->getParam('mahopdong');
    
    $hopdong = new Model_Hopdong();
    $myhopdong = $hopdong->getWhere($mahopdong);
    
    $updatehd = array('TrangThai'=>1);
    $hopdong->update_data($myhopdong['MaHopDong'], $updatehd);

    $ncc = new Model_Nhacungcap();
    $myncc = $ncc->getWhere($myhopdong['MaNhaCungCap']);
    
    $update = array("No"=>($myncc['No']+$myhopdong['ThanhTien']));
    $ncc->update_data($myncc['MaNhaCungCap'], $update);
    
    $ks = new Model_Khosoi();
    $khosoi = $ks->getWhere_khohang($myhopdong['MaKho']);
    
    // dung bien flag de kiem tra xem trong kho da co loai soi chua
    $flag = false;
    $row = array();
    if($khosoi)
    {
        foreach ($khosoi as $item)
        {
            if($item['MaSoi'] == $myhopdong['MaSoi'])
            {
                $flag = true;
                $update = array('SoTanSoi'=>($item['SoTanSoi'] + $myhopdong['SoTanSoi']));
                 $ks->update_data($item['MaKhoSoi'], $update);
                $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                $_redirector->gotoUrl(HOST_PROJECT."/index/xem/hopdong/true");
            }
        }
    }
    
    $data = array(
        "MaKhoSoi"=>null,
        "MaSoi"=>$myhopdong['MaSoi'],
        "SoTanSoi"=>$myhopdong['SoTanSoi'],
        "MaKho"=>$myhopdong['MaKho'],
    );
    $ks->insert_kho($data);
    
    $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
    $_redirector->gotoUrl(HOST_PROJECT."/index/xem/hopdong/true");
        
   
