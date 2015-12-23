<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Mau(); //sua lai
    if($this->param->isPost())
    {        
        $param = $this->param->getPost();
        
//         echo "<pre>";
//         print_r($param);
//         echo "</pre>";
        
        $check = new Form_Valid_Mau($param); 
        if($check->valid($param)){
            $data = new My_Data();
            
            if(!$data->isDupNameMau($this->param->getPost("tenmau")))
            {
                $data = array(
                    "MaMau"=>null,
                    "TenMau"=>$this->param->getPost("tenmau"),
                    "CongThuc"=>$this->param->getPost("congthuc"),
                );
                $mau = new Model_Mau();
                $mau->insert_mau($data);
                $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                $_redirector->gotoUrl(HOST_PROJECT."/index/xem/mau/true");
            }
            else
            {
                $form->populate($param);
                echo $form;
                echo "<div class='message'>";
                echo "Tên Màu đã có";
                echo "</div>";
            }
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
