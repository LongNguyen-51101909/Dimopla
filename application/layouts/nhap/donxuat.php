<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Noindex_Donxuat(); //sua lai
    if($this->param->isPost())
    {
        
        $param = $this->param->getPost();
        
        
        $check = new Form_Valid_Donxuat($param); // sua lai
        if($check->valid($param)){
            $mydate = Zend_Locale_Format::getDate($this->param->getParam("ngayxuat"),array("date_format"=>"dd.MM.yyyy"));
            $date_str =  $mydate['year']."-". $mydate['month']."-". $mydate['day'];
            $data = array(
                "MaDonXuat"=>null,
                "TenDonXuat"=>$this->param->getParam("tendonxuat"),
                "NgayXuat"=>$date_str,
                "MaHopDong"=>$this->param->getParam("mahopdong"),
            );
            $dx = new Model_Donxuat();
            $dx->insert_donxuat($data);
            
            $donxuat = $dx->getAll();            
            $dx_new = $dx->getMaxIndex();
            
            $update = array('MaDonXuat'=>$dx_new);
            
            $ctp = new Model_Caythanhpham();
            $ctp->update_data($this->param->getParam("mactp"), $update);
                        
            
            $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
            $_redirector->gotoUrl(HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$this->param->getParam("mahopdong")."/right/donxuat/madonxuat/".$dx_new);
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
