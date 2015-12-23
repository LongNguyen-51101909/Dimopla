<?php
    echo $this->headMeta();
    echo $this->headLink();

    $lv= new Model_Loaivai();
    $loaivaiall = $lv->getAll();
    $lsoi = new Model_Loaisoi();

    if($loaivaiall)
    {
        $maincontent = array();
        $title = array("Tên Loại Vải","Làm Từ Loại Sợi","Tùy Chỉnh");
    
        $data = new My_Data();
    
        foreach ($loaivaiall as $loaivai)
        {
            $loaisoi = $lsoi->getWhere($loaivai['MaSoi']);
    
            $content = array(
                $loaivai['TenLoaiVai'], $loaisoi['TenSoi'], 
                '<a href="'.HOST_PROJECT."/index/chinhsua/loaivai/true/maloaivai/".$loaivai['MaVai'].'/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/loaivai/true/maloaivai/".$loaivai['MaVai'].'/option/loaivai/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
            );
            $maincontent[]=$content;
        }
        $table = $data->createTable($title, $maincontent,"500px");
        echo $table;
    }
    else
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Loại Vải";
        echo "</div>";
    }
    
?>
