<?php
    echo $this->headMeta();
    echo $this->headLink();

    //$id_hopdong =$this->param->getParam('mahopdong');
    
    $madonxuat = $this->param->getParam('madonxuat');
    $dx= new Model_Donxuat();
    $donxuat = $dx->getWhere($madonxuat)[0];
    $id_hopdong = $donxuat['MaHopDong'];
    $fupdate = new Form_Update_Donxuat();
    $fupdate->createForm($madonxuat);
    
    if($this->param->isPost()){
            $param = $this->param->getPost();
            
            $check = new Form_Valid_DonXuat($param);
        
            if($check->valid($param))
            {
                $mydate = Zend_Locale_Format::getDate($this->param->getParam("ngayxuat"),array("date_format"=>"dd.MM.yyyy"));
                $date_str =  $mydate['year']."-". $mydate['month']."-". $mydate['day'];
                
                $data = array(
                    "MaDonXuat"=>$madonxuat,
                    "TenDonXuat"=>$this->param->getParam("tendonxuat"),
                    "NgayXuat" => $date_str,
                );
                
                $kh = new Model_Donxuat();
                $kh->update_data($madonxuat, $data);
                
                if(array_key_exists('option',$this->param->getParams()))
                    echo "<script>window.location.href='".HOST_PROJECT."/index/xem/donxuat/true';</script>";
                else
                    echo "<script>window.location.href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$id_hopdong."/right/donxuat/madonxuat/".$madonxuat."/';</script>";
                //echo "<script>window.location.href='".HOST_PROJECT."/index/main/donxuat_detail/true/madonxuat/".$id_dx."/';</script>";
                //echo "<script>window.location.href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$id_hopdong."/right/donxuat/madonxuat/".$madonxuat."/';</script>";
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