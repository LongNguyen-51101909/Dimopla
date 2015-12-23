<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Formmoi_MuaSoi(); 
    if($this->param->isPost())
    {        
        $param = $this->param->getPost();

        $check = new Form_Valid_Hopdong($param); 
        if($check->valid($param)){
            $mydate = Zend_Locale_Format::getDate($this->param->getParam("ngaymua"),array("date_format"=>"dd.MM.yyyy"));
            $date_str =  $mydate['year']."-". $mydate['month']."-". $mydate['day'];
            $data = array(
                "MaHopDong"=>null,
                "SoTanSoi"=>$this->param->getParam("sotansoi"),
                "ThanhTien"=>$this->param->getParam("thanhtien"),
                "NgayMua"=>$date_str,
                "MaSoi"=>$this->param->getParam("loaisoi"),
                "MaKho"=>$this->param->getParam("nhapkhosoi"),
                "MaNhaCungCap"=>$this->param->getParam("nhacungcap"),
            );
            $hd = new Model_Hopdong();
            $hd->insert_hopdong($data);
            
            $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
            $_redirector->gotoUrl(HOST_PROJECT."/index/xem/hopdong/true/");
            
            // update so no cho ncc
//             $thanhtien = $this->param->getParam("thanhtien");
//             $mancc = $this->param->getParam("manhacungcap");
//             $ncc= new Model_Nhacungcap();
//             $nhacungcap = $ncc->getWhere($mancc);
//             $update = array('No'=>$nhacungcap['No']+$thanhtien);
//             $ncc->update_data($mancc, $update);
            
//             if(array_key_exists('congty',$this->param->getParams()))
//             {
//                 $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
//                 $_redirector->gotoUrl(HOST_PROJECT."/index/main/congty/true");
//             }
//             else if(!array_key_exists('option',$this->param->getParams()))
//             {
//                 $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
//                 $_redirector->gotoUrl(HOST_PROJECT."/index/main/khachhang_detail/true/makhachhang/".$this->param->getParam("makhachhang"));
//             }
//             else
//             {
//                 $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
//                 $_redirector->gotoUrl(HOST_PROJECT."/index/xem/donhang/true");
//             }
        }
        else{
            $form->populate($param);
            echo $form;
            echo "<div class='message'>";
            foreach($check->messages as $item)
            {
                echo $item."<br/>";
            }
            echo "</div>";
        }
    }
    else{
        echo $form;
    }
?>
