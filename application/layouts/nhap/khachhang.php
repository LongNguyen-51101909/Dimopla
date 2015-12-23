<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Khachhang(); 
    if($this->param->isPost())
    {        
        $param = $this->param->getPost();
        
        $check = new Form_Valid_Khachhang($param); 
        
         if($check->valid($param)){
            $data = array(
                "MaKhachHang"=>null,
                "TenKhachHang"=>$this->param->getPost("ten"),
                "DiaChi"=>$this->param->getPost("diachi"),
                "SoDienThoai"=>$this->param->getPost("sdt"),
            );
            $kh = new Model_Khachhang();
            $kh->insert_khachhang($data);
            echo "<div class='message'>";
            echo "Them thanh cong";
            echo "</div>";
            if($this->param->getParams("option")==null)
            {
                $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                $_redirector->gotoUrl(HOST_PROJECT."/index/main");
            }
            else 
            {
                $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                $_redirector->gotoUrl(HOST_PROJECT."/index/xem/khachhang/true");
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
