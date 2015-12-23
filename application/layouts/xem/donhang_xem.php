<?php
    echo $this->headMeta();
    echo $this->headLink();

    $dh= new Model_Donhang();
    $donhang = $dh->getAll();


    
    $data = new My_Data();
    $dh = $donhang;
    if($dh){
    
        $title = array("Tên Đơn Hàng","Ngày Đặt","Tiền Đặt Hàng","Số Mét Vải","Khách Hàng","Tùy Chỉnh","Hợp Đồng Đã Tạo","Tạo Hợp Đồng");
        $content = array();
    
        foreach($dh as $item)
        {
            $subcontent = array();
            $mydate = Zend_Locale_Format::getDate($item['NgayDat'],array("date_format"=>"yyyy.MM.dd"));
            $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
            $kh = new Model_Khachhang();
            $khachhang = $kh->getWhere($item['MaKhachHang'])[0];
    
            $subcontent[] = "<a href='".HOST_PROJECT."/index/main/khachhang_detail/true/makhachhang/".$item['MaKhachHang']."/'>".$item['TenDonHang']."</a>";
            $subcontent[] = $date_str;
            $subcontent[] = $item['TienDatHang'];
            $subcontent[] = $item['SoMetVai'];
            $subcontent[] = $khachhang['TenKhachHang'];
            $subcontent[] = '<a href="'.HOST_PROJECT."/index/chinhsua/donhang/true/makhachhang/".$item['MaKhachHang']."/madonhang/".$item['MaDonHang'].'/option/donhang">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/donhang/true/makhachhang/".$item['MaKhachHang']."/madonhang/".$item["MaDonHang"].'/option/xem/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>';
    
            $hopdong = $data->getHopDong($item['MaDonHang']);
            $hd_old= "chưa tạo";
             
            if($hopdong){
                $hd_old= "";
                foreach ($hopdong as $hd_item)
                {
                    $hd_old .= "<a href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$hd_item['MaHopDong']."/'>".$hd_item['TenHopDong']."</a>,&nbsp<br>";
                }
            }
            $subcontent[] = $hd_old;
            $subcontent[] = '<button type="button" class="btn btn-success"><a class ="axem" href="'.HOST_PROJECT."/index/nhaplieu/hopdong/true/makhachhang/".$item['MaKhachHang']."/madonhang/".$item['MaDonHang'].'/option/hopdong/">Tạo Hợp Đồng</a></button>';
            $content[] = $subcontent;
        }
        $data = new My_Data();
        $table = $data->createTable($title,$content,"1100px");
        echo $table;
    }
    else
        echo "Chưa tồn tại đơn hàng";
    
?>