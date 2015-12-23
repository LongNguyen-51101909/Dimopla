<?php
    echo $this->headMeta();
    echo $this->headLink();

    $maloaivai = $this->param->getParam('maloaivai');
    $fupdate = new Form_Update_Loaivai();
    $fupdate->createForm($maloaivai);
    
    if($this->param->isPost()){
            $param = $this->param->getPost();
            
            $check = new Form_Valid_Loaivai($param);
        
            if($check->valid($param))
            {
                $data = array(
                    "MaVai"=>$maloaivai,
                    "TenLoaiVai"=>$this->param->getParam("tenloaivai"),
                    "MaSoi" => $this->param->getParam("masoi"),
                );
                
                $kh = new Model_Loaivai();
                $kh->update_data($maloaivai, $data);
                echo "<script>window.location.href='".HOST_PROJECT."/index/xem/loaivai/true';</script>";
                
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