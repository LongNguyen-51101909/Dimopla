<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Loaivai(); //-----------
    if($this->param->isPost())
    {        
        $param = $this->param->getPost();
        
        $check = new Form_Valid_Loaivai($param); 
        if($check->valid($param)){
            $data = new My_Data();
            if(!$data->isDupNameLoaiVai($this->param->getPost("tenloaivai")))
            {
                $data = array(
                    "MaLoaiVai"=>null,
                    "TenLoaiVai"=>$this->param->getPost("tenloaivai"),
                    "MaSoi"=>$this->param->getPost("masoi"),
                );
                $tv = new Model_Loaivai();
                $tv->insert_loaivai($data);
                
                $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                $_redirector->gotoUrl(HOST_PROJECT."/index/xem/loaivai/true");
            }
            else
            {
                $form->populate($param);
                echo $form;
                echo "<div class='message'>";
                echo "Tên Loại Vải đã có";
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
