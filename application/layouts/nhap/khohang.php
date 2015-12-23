<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Khohang(); //sua lai
    if($this->param->isPost())
    {
        
        $param = $this->param->getPost();
        
//         echo "<pre>";
//         print_r($param);
//         echo "</pre>";
        
        $check = new Form_Valid_Khohang($param); // sua lai
        if($check->valid($param)){
            $data = array(
                "MaKho"=>null,
                "TenKho"=>$this->param->getParam("tenkhohang"),
                "Diachi"=>$this->param->getParam("diachi"),
                "sdt"=>$this->param->getParam("sdt"),
                "MaLoaiKho"=>$this->param->getParam("loaikho"),
            );
            $dh = new Model_Khohang();
            $dh->insert_khohang($data);
            echo "<div class='message'>";
            echo "Them thanh cong";
            echo "</div>";
            $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
            $_redirector->gotoUrl(HOST_PROJECT."/index/xem/khohang/true");
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
