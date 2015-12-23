<?php
    echo $this->headMeta();
    echo $this->headLink();

    $id_kho = $this->param->getParam('makho');
    $id_ctp = $this->param->getParam('mactp');
    $id_hopdong =$this->param->getParam('mahopdong');
    $fupdate = new Form_Update_ChonKhoHang();
    $fupdate->createForm($id_kho);
    
    if($this->param->isPost()){
            $param = $this->param->getPost();
        
                $data = array(
                    "MaKho"=>$this->param->getParam("khohang"),
                );

                $kh = new Model_Caythanhpham();
                $kh->update_data($id_ctp, $data);

                //echo "<script>window.location.href='".HOST_PROJECT."/index/main/kho_detail/true/makho/".$this->param->getParam("chonkhohang")."/mactp/".$id_ctp."/';</script>";
                echo "<script>window.location.href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$id_hopdong."/right/khohang/makho/".$this->param->getParam("khohang")."/mactp/".$id_ctp."/';</script>";
           
        }
        else
        {
            echo $fupdate;
            
        }