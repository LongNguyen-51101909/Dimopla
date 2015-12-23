<?php
    echo $this->headMeta();
    echo $this->headLink();

    $id_cm = $this->param->getParam('macaymoc');
    $id_hopdong =$this->param->getParam('mahopdong');
    $fupdate = new Form_Update_Caymoc();
    $fupdate->createForm($id_cm);
    
    if($this->param->isPost()){
            $param = $this->param->getPost();
            
            $check = new Form_Valid_Caymoc($param);
        
            if($check->valid($param))
            {
                $data = array(
                    "MaMoc"=>$id_cm,
                    "TenCayMoc"=>$this->param->getParam("tencaymoc"),
                    "SoMetVai" => $this->param->getParam("sometvai"),
                    "SoLuongCayMoc" => $this->param->getParam("soluong"),
                    "MaLoaiVai" => $this->param->getParam("maloaivai"),
                );
                
                $kh = new Model_Caymoc();
                $kh->update_data($id_cm, $data);
                //echo "<script>window.location.href='".HOST_PROJECT."/index/main/caymoc_detail/true/macaymoc/".$id_cm."/';</script>";
                if(array_key_exists('option',$this->param->getParams()))
                    echo "<script>window.location.href='".HOST_PROJECT."/index/xem/caymoc/true';</script>";
                else
                    echo "<script>window.location.href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$id_hopdong."/right/caymoc/macaymoc/".$id_cm."/';</script>";
                
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