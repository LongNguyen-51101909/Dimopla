<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Nhacungcap(); //-----------
    if($this->param->isPost())
    {
//         echo "<pre>";
//         print_r($this->param);
//         echo "</pre>";
        
        $param = $this->param->getPost();
        
//         echo "<pre>";
//         print_r($param);
//         echo "</pre>";
        
        $check = new Form_Valid_Nhacungcap($param); 
        if($check->valid($param)){
            $data = new My_Data();
            if(!$data->isDupNameLoaiVai($this->param->getPost("tenloaivai")))
            {
                $data = array(
                    "MaNhaCungCap"=>null,
                    "TenNhaCungCap"=>$this->param->getPost("ten"),
                    "Sdt"=>$this->param->getPost("sdt"),
                    "DiaChi"=>$this->param->getPost("diachi"),
                    "Fax"=>$this->param->getPost("fax"),
                    "No"=>$this->param->getPost("no"),
                );
                $ncc = new Model_Nhacungcap();
                $ncc->insert_nhacungcap($data);
                $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                $_redirector->gotoUrl(HOST_PROJECT."/index/xem/nhacungcap/true/");
            }
            else
            {
                $form->populate($param);
                echo $form;
                echo "<div class='message'>";
                echo "Tên Nhà Cung Cấp đã có";
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
