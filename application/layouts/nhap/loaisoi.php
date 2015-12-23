<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Loaisoi(); //-----------
    if($this->param->isPost())
    {        
        $param = $this->param->getPost();
        
        echo "<pre>";
        print_r($param);
        echo "</pre>";
        
        $check = new Form_Valid_Loaisoi($param); //-----------
        if($check->valid($param)){
            $data = array(
                "MaSoi"=>null,
                "TenSoi"=>$this->param->getPost("tenloaisoi"),
            );
            $tv = new Model_Loaisoi();
            $tv->insert_loaisoi($data);
            echo "<div class='message'>";
            echo "Them thanh cong";
            echo "</div>";
            $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
            $_redirector->gotoUrl(HOST_PROJECT."/index/xem/loaisoi/true");
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
