<?php
    echo $this->headMeta();
    echo $this->headLink();

    $masoi= $this->param->getParam('masoi');
    $fupdate = new Form_Update_Loaisoi();
    $fupdate->createForm($masoi);
    
    if($this->param->isPost()){
            $param = $this->param->getPost();
            
            $check = new Form_Valid_Loaisoi($param);
        
            if($check->valid($param))
            {
                $data = array(
                    "MaSoi"=>$masoi,
                    "TenSoi"=>$this->param->getParam("tenloaisoi"),
                );
                
                $kh = new Model_Loaisoi();
                $kh->update_data($masoi, $data);
                echo "<script>window.location.href='".HOST_PROJECT."/index/xem/loaisoi/true';</script>";
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