<?php
    echo $this->headMeta();
    echo $this->headLink();

    $ln= new Model_Lonhuom();
    $lonhuomall = $ln->getAll();

    if($lonhuomall)
    {
        $maincontent = array();
        $title = array("Tên Lô Nhuộm","Ngày Nhuộm","Màu","Tùy Chỉnh",);
                    
        $data = new My_Data();
        
        foreach ($lonhuomall as $lonhuom)
        {
            $mydate = Zend_Locale_Format::getDate($lonhuom['NgayNhuom'],array("date_format"=>"yyyy.MM.dd"));
            $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;

            $cm = new Model_Caymoc();
            $caymoc= $cm->getWhere_lonhuom($lonhuom['MaLoNhuom']); 
            //  $tenlonhuom = "<a href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$caymoc['MaHopDong']."/right/lonhuom/malonhuom/".$lonhuom['MaLoNhuom']."/'>". $lonhuom['TenLoNhuom']."</a>";
            $content = array(
                $lonhuom['TenLoNhuom'], $date_str, $data->getNameMau($lonhuom['MaMau']),
                '<a href="'.HOST_PROJECT."/index/chinhsua/lonhuom/true/malonhuom/".$lonhuom['MaLoNhuom'].'/option/lonhuom">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/lonhuom/true/malonhuom/".$lonhuom['MaLoNhuom'].'/option/lonhuom" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
            );
            $maincontent[]=$content;
        }
        $table = $data->createTable($title, $maincontent,"600px");
        echo $table;
    
    }
    else 
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Lô Nhuộm";
        echo "</div>";
    }
    ?>