<?php
    echo $this->headMeta();
    echo $this->headLink();

    $mactp = $this->param->getParam("mactp");
    
    $ctp= new Model_Caythanhpham();
    $ctprow = $ctp->getWhere($mactp);

    $loaivai = new Model_Loaivai();
    $lonhuom = new Model_Lonhuom();
    $mau = new Model_Mau();
    $caymoc = new Model_Caymoc();
    
       
    $title = array("Mã Cây TP","Loại Vải","Màu Vải","Số Mét Vải");
    
    $caymocrow = $caymoc->getWhere_ctp($ctprow['MaCTP']);
    $loaivairow = $loaivai->getWhere($caymocrow['MaVai']);
    $lonhuomrow = $lonhuom->getWhere($caymocrow['MaLoNhuom']);

    $maurow = $mau->getWhereIdMau($lonhuomrow['MaMau']);
    $content = array(
        $ctprow['MaCTP'],$loaivairow['TenLoaiVai'], $maurow['TenMau'], $ctprow['SoMetVai'],
    );

    $data = new My_Data();
    $table = $data->createTable($title, $content,"450px");
    echo $table;

    //require_once APPLICATION_PATH.'/layouts/nhap/chonkhotp.php';
    
    $form = new Form_Formmoi_Chonkhotp();
    if($this->param->isPost())
    {
        $param = $this->param->getPost();
    
        // makhohang la ma cua kho cay thanh pham se nhap
        $makhohang = $this->param->getParam("mykhohang");
    
        $mactp = $this->param->getParam("mactp");
    
        $caytp = new Model_Caythanhpham();
        $caytprow = $caytp->getWhere($mactp);
    
        // update kho tp cho caytp
        $update = array("MaKho"=>$makhohang);
        $caytp->update_data($caytprow['MaCTP'], $update);
    
        $khotp = new Model_KhoThanhPham();
    
        $khotprow = $khotp->getWhere_loaivai_mauvai($loaivairow['MaVai'], $maurow['MaMau']);
    
        if($khotprow)
        {
            
            $update = array("TongSoMet"=>($khotprow['TongSoMet']+$caytprow['SoMetVai']),
                            "SoCayTP"=>($khotprow['SoCayTP']+1)
            );
            $khotp->update_data($khotprow['MaKhoTP'], $update);
            
        }
        else 
        {
            // neu khong co loai vai trong kho moc thi them moi
            $data = array(
                "MaKhoTP"=>null,
                "MaVai"=>$loaivairow['MaVai'],
                "MaMau"=>$maurow['MaMau'],
                "TongSoMet"=>$caytprow['SoMetVai'],
                "SoCayTP"=> 1,
                "MaKho"=>$makhohang
            );
            $khotp->insert_kho($data);
        }
        
        echo "<script>window.location.href='".HOST_PROJECT."/index/xem/caythanhpham/true';</script>";
    }
    else{
        echo $form;
    }
    