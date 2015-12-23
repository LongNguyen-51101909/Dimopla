<?php
    echo $this->headMeta();
    echo $this->headLink();

    $dx= new Model_Donxuat();
    $donxuatall = $dx->getAll();
    if($donxuatall)
    {
        $maincontent = array();
        $title = array("Tên Đơn Xuất","Ngày Xuất","Thuộc Hợp Đồng","Tùy Chỉnh",);
        
        $data = new My_Data();
        
        foreach ($donxuatall as $donxuat)
        {
            $mydate = Zend_Locale_Format::getDate($donxuat['NgayXuat'],array("date_format"=>"yyyy.MM.dd"));
            $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
            
            $hd = new Model_Hopdong();
            $myhopdong = $hd->getWhereIdHopDong($donxuat['MaHopDong']);
            
            $tendonxuat = "<a href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$myhopdong['MaHopDong']."/right/donxuat/madonxuat/".$donxuat['MaDonXuat']."/'>". $donxuat['TenDonXuat']."</a>";
            
            $content = array(
                $tendonxuat,$date_str, $myhopdong['TenHopDong'],
                '<a href="'.HOST_PROJECT."/index/chinhsua/donxuat/true/madonxuat/".$donxuat['MaDonXuat'].'/option/donxuat/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/donxuat/true/mahopdong/".$myhopdong['TenHopDong']."/madonxuat/".$donxuat['MaDonXuat'].'/option/donxuat/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
            );
            $maincontent[] = $content;
        }
        $table = $data->createTable($title, $maincontent,"600px");
        echo $table;
    
    }
    else 
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Đơn Xuất";
        echo "</div>";
    }
    ?>