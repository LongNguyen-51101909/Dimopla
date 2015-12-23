<?php
    echo $this->headMeta();
    echo $this->headLink();

    $id_khachhang = $this->param->getParam('makhachhang');
    $fupdate = new Form_Update_Khachhang();
    $fupdate->createForm($id_khachhang);
    
    if($this->param->isPost()){
            $param = $this->param->getPost();
            
            $check = new Form_Valid_Khachhang($param);
                        
            if($check->valid($param))
            {
                $data = array(
                    "MaKhachHang"=>$id_khachhang,
                    "TenKhachHang"=>$this->param->getParam("ten"),
                    "SoDienThoai" => $this->param->getParam("sdt"),
                    "DiaChi" => $this->param->getParam("diachi"),
                );
                
                $kh = new Model_Khachhang();
                $kh->update_data($id_khachhang, $data);
                if(array_key_exists('option',$this->param->getParams()))
                    echo "<script>window.location.href='".HOST_PROJECT."/index/xem/khachhang/true';</script>";
                else
                    echo "<script>window.location.href='".HOST_PROJECT."/index/main/khachhang_detail/true/makhachhang/".$id_khachhang."/';</script>";
                
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