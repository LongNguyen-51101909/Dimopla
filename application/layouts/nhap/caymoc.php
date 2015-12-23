<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $makhoisoi = $this->param->getParam("makhoisoi");
    $khosoi = new Model_Khosoi();
    $khosoirow = $khosoi->getWhere($makhoisoi);

    $form = new Form_Formmoi_Caymoc(); //sua lai
    $form->createForm($makhoisoi);
    
    if($this->param->isPost())
    {   
        $param = $this->param->getPost();
        $check = new Form_Valid_Caymoc($param,$khosoirow['SoTanSoi']); // sua lai
        if($check->valid($param)){
            $data = array(
                "MaMoc"=>null,
                "SoKgSoi"=>$this->param->getParam("sokgsoi"),
                "MaVai"=>$this->param->getParam("mavai"),
                "SoMetVai"=>$this->param->getParam("sometvai"),
                "MaKhoSoi"=>$khosoirow['MaKhoSoi'],
            );

            $cm = new Model_Caymoc();
            $cm->insert_caymoc($data);
            
            //$cm_new = $cm->getMaxIndex();

            $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
            $_redirector->gotoUrl(HOST_PROJECT."/index/xem/caymoc/true");
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
