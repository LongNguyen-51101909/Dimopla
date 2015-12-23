<?php
    echo $this->headMeta();
    echo $this->headLink();

    $mancc = $this->param->getParam('mancc');
    $id_hopdong =$this->param->getParam('mahopdong');
    $fupdate = new Form_Update_Nhacungcap();
    $fupdate->createForm($mancc);
    
    if($this->param->isPost()){
            $param = $this->param->getPost();
            
            $check = new Form_Valid_Nhacungcap($param);
        
            if($check->valid($param))
            {
                $data = array(
                    "MaNhaCungCap"=>$mancc,
                    "TenNhaCungCap"=>$this->param->getParam("ten"),
                    "Sdt" => $this->param->getParam("sdt"),
                    "DiaChi" => $this->param->getParam("diachi"),
                    "Fax" => $this->param->getParam("fax"),
                );
                
                $kh = new Model_Nhacungcap();
                $kh->update_data($mancc, $data);
                //echo "<script>window.location.href='".HOST_PROJECT."/index/main/caymoc_detail/true/macaymoc/".$id_cm."/';</script>";
                echo "<script>window.location.href='".HOST_PROJECT."/index/xem/nhacungcap/true/';</script>";
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