<?php
    echo $this->headMeta();
    echo $this->headLink();

    $id_donhang = $this->param->getParam('madonhang');
    $fupdate = new Form_Update_Donhang();
    $fupdate->createForm($id_donhang);
    
    if($this->param->isPost()){
        $param = $this->param->getPost();
            
            $check = new Form_Valid_Donhang($param);
            
            if($check->valid($param))
            {
                $mydate = Zend_Locale_Format::getDate($this->param->getParam("ngaydathang"),array("date_format"=>"dd.MM.yyyy"));
                $date_str =  $mydate['year']."-". $mydate['month']."-". $mydate['day'];
                $data = array(
                    "MaDonHang"=>$id_donhang,
                    "TenDonHang"=>$this->param->getParam("tendonhang"),
                    "NgayDat" => $date_str,
                    "TienDatHang" => $this->param->getParam("tiendathang"),
                    "SoMetVai" => $this->param->getParam("sometvai"),
                );
                $dh = new Model_Donhang();
                $dh->update_data($id_donhang, $data);
                if(array_key_exists('option',$this->param->getParams()))
                    echo "<script>window.location.href='".HOST_PROJECT."/index/xem/donhang/true';</script>";
                else
                    echo "<script>window.location.href='".HOST_PROJECT."/index/main/khachhang_detail/true/makhachhang/".$this->param->getParam('makhachhang')."/';</script>";
                
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