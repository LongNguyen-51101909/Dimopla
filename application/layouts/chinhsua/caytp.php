<?php
    echo $this->headMeta();
    echo $this->headLink();

    $id_ctp = $this->param->getParam('mactp');
    $id_hopdong =$this->param->getParam('mahopdong');
    $fupdate = new Form_Update_Caythanhpham();
    $fupdate->createForm($id_ctp);
    
    if($this->param->isPost()){
            $param = $this->param->getPost();
           
            $check = new Form_Valid_Caythanhpham($param);
        
            if($check->valid($param))
            {
                $data = array(
                    "MaCTP"=>$id_ctp,
                    "TenCTP"=>$this->param->getParam("TenCTP"),
                    "SoMetVai" => $this->param->getParam("sometvai"),
                );
                
                $kh = new Model_Caythanhpham();
                $kh->update_data($id_ctp, $data);
                //echo "<script>window.location.href='".HOST_PROJECT."/index/main/ctp_detail/true/mactp/".$id_ctp."/';</script>";
                if(array_key_exists('option',$this->param->getParams()))
                    echo "<script>window.location.href='".HOST_PROJECT."/index/xem/caythanhpham/true';</script>";
                else
                    echo "<script>window.location.href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$id_hopdong."/right/caythanhpham/mactp/".$id_ctp."/';</script>";
                
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