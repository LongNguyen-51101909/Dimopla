<?php
    echo $this->headMeta();
    echo $this->headLink();

    $id_hopdong = $this->param->getParam('mahopdong');
    $fupdate = new Form_Update_Hopdong();
    $fupdate->createForm($id_hopdong);
    
    if($this->param->isPost()){
        $param = $this->param->getPost();
            
            $check = new Form_Valid_Hopdong($param);
            if($check->valid($param))
            {
                $mydate = Zend_Locale_Format::getDate($this->param->getParam("ngayky"),array("date_format"=>"dd.MM.yyyy"));
                $date_str =  $mydate['year']."-". $mydate['month']."-". $mydate['day'];
                $data = array(
                    "MaHopDong"=>$id_hopdong,
                    "TenHopDong"=>$this->param->getParam("tenhopdong"),
                    "MoTa"=>$this->param->getParam("mota"),
                    "NgayKy"=>$date_str,
                    "SoTanSoi"=>$this->param->getParam("sotansoi"),
                    "ThanhTien"=>$this->param->getParam("thanhtien"),
                    "MaMau"=>$this->param->getParam("mamau"),
                    "MaLoaiVai"=>$this->param->getParam("maloaivai"),
                    "MaNhaCungCap"=>$this->param->getParam("manhacungcap"),
                );
                $dh = new Model_Hopdong();
                $dh->update_data($id_hopdong, $data);
                if(array_key_exists('option',$this->param->getParams()))
                    echo "<script>window.location.href='".HOST_PROJECT."/index/xem/hopdong/true';</script>";
                else
                    echo "<script>window.location.href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$this->param->getParam('mahopdong')."/';</script>";
                
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