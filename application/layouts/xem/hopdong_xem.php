<?php
    echo $this->headMeta();
    echo $this->headLink();

    $hd= new Model_Hopdong();
    $hopdongall = $hd->getAll();
    $data = new My_Data();
    if($hopdongall)
    {
        $maincontent = array();
        
        $data = new My_Data();
        $title = array("Mã Hợp Đồng","Số Tấn Sợi","Thành Tiền","Ngày Ký",
                                "Loại Sợi","Kho Sợi","Nhà Cung Cấp","Tùy Chỉnh","Nhập Kho");
        
        foreach ($hopdongall as $hopdong)
        {            
            
            
            $mydate = Zend_Locale_Format::getDate($hopdong['NgayMua'],array("date_format"=>"yyyy.MM.dd"));
            $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
            $op = $data->getOpHopdong($hopdong['MaSoi'],$hopdong['MaKho'],$hopdong['MaNhaCungCap']);
            $button= "<a class ='thembutton' href='".HOST_PROJECT."/index/nhaplieu/nhapsoi/true/mahopdong/".$hopdong['MaHopDong']."'/>Nhập Kho</a>";
            $chinhsua = '<a href="'.HOST_PROJECT."/index/chinhsua/hopdong/true/mahopdong/".$hopdong['MaHopDong'].'/option/hopdong/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/hopdong/true/mahopdong/".$hopdong['MaHopDong'].'/option/xem/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>';
            $nhapkho = "";
            if($hopdong['TrangThai'] == 1) 
                $nhapkho = "Đã Nhập";
             else 
                $nhapkho =  $button;
             
            $content = array($hopdong['MaHopDong'],$hopdong['SoTanSoi'],$hopdong['ThanhTien'],$date_str,
                             $op['tensoi'],$op['tenkho'],$op['tenncc'],$chinhsua,$nhapkho
                            );
            $maincontent[]= $content;
        }    
        $table = $data->createTable($title, $maincontent,"1100px");
        echo $table;
    }
    
    else 
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Hợp Đồng";
        echo "</div>";
    }
    ?>