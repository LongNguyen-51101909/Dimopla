<?php
    echo $this->headMeta();
    echo $this->headLink();

    $cm= new Model_Caymoc();
    $caymocall = $cm->getAll();
    if($caymocall)
    {    
        $maincontent = array();
        $title = array("Mã Mộc","Số Kg Sợi","Loại Vải","Số Mét Vải","Tùy Chỉnh","Nhập Kho",);
        
        $loaivai = new Model_Loaivai();
        
        $data = new My_Data();
        $khohang = new Model_Khohang();
        foreach ($caymocall as $caymoc)
        {
            $loaivairow = $loaivai->getWhere($caymoc['MaVai']);
            $chinhsua = '<a href="'.HOST_PROJECT."/index/chinhsua/caymoc/true/mamoc/".$caymoc['MaMoc'].'/option/caymoc/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/caymoc/true/mamoc/".$caymoc['MaMoc'].'/option/xem/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>';
            $button= "<a class ='thembutton' href='".HOST_PROJECT."/index/xem/caymoc_detail/true/mamoc/".$caymoc['MaMoc']."'/>Nhập Kho</a>";
            $nhapkho = "";
            if($caymoc['MaKhoMoc'])
                $nhapkho = "&nbspĐã Nhập";
            else
                $nhapkho =  $button;
            //$khohangrow = $khohang->getWhere($caymoc['MaKho'])[0];
            $content = array(
                $caymoc['MaMoc'],$caymoc['SoKgSoi'],$loaivairow['TenLoaiVai'],
                $caymoc['SoMetVai'],$chinhsua,$nhapkho
            );
            $maincontent[] = $content;
        }
        $table = $data->createTable($title, $maincontent,"600px");
        echo $table;
    }
    
    else 
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Cây Mộc";
        echo "</div>";
    }
    
    $mamoc = $this->param->getParam("mamoc");
    //echo $mamoc;    
    ?>
    

    <?php 
        if($mamoc)
        {
            require_once APPLICATION_PATH.'/layouts/nhap/chonkhomoc.php';
        }
    ?>
    
 
    