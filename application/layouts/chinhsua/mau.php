<?php
    echo $this->headMeta();
    echo $this->headLink();

    $mamau = $this->param->getParam('mamau');
    $fupdate = new Form_Update_Mau();
    $fupdate->createForm($mamau);
    
    if($this->param->isPost()){
            $param = $this->param->getPost();
            
            $check = new Form_Valid_Mau($param);
        
            if($check->valid($param))
            {
                $data = array(
                    "MaMau"=>$mamau,
                    "TenMau"=>$this->param->getParam("tenmau"),
                    "CongThuc" => $this->param->getParam("congthuc"),
                );
                
                $kh = new Model_Mau();
                $kh->update_data($mamau, $data);
                echo "<script>window.location.href='".HOST_PROJECT."/index/xem/mau/true';</script>";
                
            }
            else 
            {
                echo $fupdate;
                echo "<div class='message'>";
                foreach($check->messages as $item)
                {
                    echo $item."<br/>";
                }
                echo "</div>";
            }
        }
        else
        {
            echo $fupdate;
        }