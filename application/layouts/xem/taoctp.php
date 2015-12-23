<?php
    echo $this->headMeta();
    echo $this->headLink();

    $mamoc = $this->param->getParam("mamoc");
    
    $cm= new Model_Caymoc();
    $caymoc = $cm->getWhere($mamoc);

    if($caymoc)
    {    
        $maincontent = array();
        $title = array("Mã Mộc","Loại Vải","Số Mét Vải");
        
        $loaivai = new Model_Loaivai();
        
        $data = new My_Data();
        $khohang = new Model_Khohang();
        
        $loaivairow = $loaivai->getWhere($caymoc['MaVai']);

        $content = array(
            $caymoc['MaMoc'],$loaivairow['TenLoaiVai'],$caymoc['SoMetVai'],
        );
        $maincontent[] = $content;
    }
    $table = $data->createTable($title, $maincontent,"300px");
    echo $table;

    
    
    // lo nhuom
    $mau = new Model_Mau();
    $lonhuom = new Model_Lonhuom();
    $malonhuom = $this->param->getParam("malonhuom");
    if($malonhuom == null)
    {
        $lonhuomall = $lonhuom->getAll();
        
        $title = array("Tên Lô Nhuộm", "Ngày Nhuộm","Màu","Chọn");
        $content = array();
        foreach ($lonhuomall as $item)
        {
            $maurow = $mau->getWhereIdMau($item['MaMau']);
            $button= "<a class ='thembutton' href='".HOST_PROJECT."/index/xem/taoctp/true/option/them/mamoc/".$mamoc."/malonhuom/".$item['MaLoNhuom']."'/>Chọn</a>";
            $subcontent = array(
                $item['TenLoNhuom'],$item['NgayNhuom'],$maurow['TenMau'],$button
            );
            $content[] = $subcontent;
        }
        $table = $data->createTable($title, $content,"500px");
        echo $table;
    }
    else
    {
        $lonhuomall = $lonhuom->getWhere($malonhuom);
        
        $title = array("Tên Lô Nhuộm", "Ngày Nhuộm","Màu");
        $content = array();
        foreach ($lonhuomall as $item)
        {
            $maurow = $mau->getWhereIdMau($item['MaMau']);
            $subcontent = array(
                $item['TenLoNhuom'],$item['NgayNhuom'],$maurow['TenMau']
            );
            $content[] = $subcontent;
        }
        $table = $data->createTable($title, $content,"400px");
        echo $table; 

        $form= new Form_Formmoi_Caythanhpham();
        if($this->param->isPost())
        {
            $sometvai =  $this->param->getPost("sometvai");
            $data = array(
                            "MaCTP"=>null, "SoMetVai"=>$sometvai  
            );
            $ctp = new Model_Caythanhpham();
            $ctp->insert_ctp($data);
            
            $mactp = $ctp->getMaxIndex();
            $update = array("MaCTP"=>$mactp,"MaLoNhuom"=>$malonhuom);
            $cm->update_data($caymoc['MaMoc'], $update);
            echo "<script>window.location.href='".HOST_PROJECT."/index/xem/caythanhpham/true/';</script>";
        }
        else 
        {
            echo $form;
        }
    }
    