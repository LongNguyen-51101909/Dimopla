<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Hopdong(); //-----------
    if($this->param->isPost())
    {
//         echo "<pre>";
//         print_r($this->param);
//         echo "</pre>";
        
        $param = $this->param->getPost();
        
//         echo "<pre>";
//         print_r($param);
//         echo "</pre>";
        
        $check = new Form_Valid_Hopdong($param); //-----------
        if($check->valid($param)){
//             $data = array(
//                 "id_sanpham"=>null,
//                 "masp"=>$this->_request->getPost("masp"),
//                 "tensp"=>$this->_request->getPost("tensp"),
//                 "giabanle"=>$this->_request->getPost("giabanle"),
//             );
//             $tv = new Model_Sanpham();
//             $tv->insert_sanpham($data);
            echo "<div class='message'>";
            echo "Them thanh cong";
            echo "</div>";
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
