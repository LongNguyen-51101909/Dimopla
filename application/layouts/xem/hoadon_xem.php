<?php
    echo $this->headMeta();
    echo $this->headLink();
    
    $hd= new Model_Hoadon();
    $hoadonall = $hd->getAll();
    if($hoadonall)
    {
        $maincontent = array();
        $title = array("Tên Hóa Đơn","Tiền Thanh Toán","Ngày Thanh Toán","Hình Thức","Nhà Cung Cấp","Tùy Chỉnh",);
    
        $data = new My_Data();
    
        foreach ($hoadonall as $hoadon)
        {
            $mydate = Zend_Locale_Format::getDate($hoadon['NgayThanhToan'],array("date_format"=>"yyyy.MM.dd"));
            $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
    
    
            $ht =  new Model_Hinhthuc();
            $hinhthuc = $ht->getWhere($hoadon['HinhThuc'])['TenHinhThuc'];
            
            $ncc= new Model_Nhacungcap();
            $nhacungcap = $ncc->getWhere($hoadon['MaNhaCungCap']);
            
            $content = array(
                $hoadon['TenHoaDon'],$hoadon['SoTien'],$date_str, $hinhthuc,$nhacungcap['TenNhaCungCap'],
                '<a href="'.HOST_PROJECT."/index/chinhsua/hoadon/true/mahoadon/".$hoadon['MaHoaDon'].'/option/hoadon/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/hoadon/true/mahoadon/".$hoadon['MaHoaDon'].'/option/hoadon/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
            );
            $maincontent[] = $content;
        }
        $table = $data->createTable($title, $maincontent,"800px");
        echo $table;
    
    }
    else
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Hóa Đơn!";
        echo "</div>";
    }
