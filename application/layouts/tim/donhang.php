<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Searchs_Donhang();
    echo $form;
    if($this->param->isPost())
    {
        $model = new Model_Donhang();
        $kh = new Model_Khachhang();
        $key = $this->param->getParam("key");
        $donhangs = $model->searchByKey($key);
        
        if($donhangs != false){
    
            $title = array("Mã Đơn Hàng","Tên Đơn Hàng","Ngày Đặt","Tiền Đặt Hàng","Khách Hàng","Số Mét Vải","Tùy Chỉnh");
            
            $maincontent = array();
            foreach ($donhangs as $item)
            {
            $content = array(
                $item['MaDonHang'],
                $item['TenDonHang'],
                $item['NgayDat'],
                $item['TienDatHang'],
                $kh->getWhere($item['MaKhachHang'])[0]['TenKhachHang'],
                $item['SoMetVai'],
                '<a href="'.HOST_PROJECT."/index/chinhsua/donhang/true/makhachhang/".$item['MaKhachHang']."/madonhang/".$item['MaDonHang'].'/option/donhang">Sửa</a>&nbsp|&nbsp'.
                    '<a href="'.HOST_PROJECT."/index/xoa/donhang/true/makhachhang/".$item['MaKhachHang']."/madonhang/".$item["MaDonHang"].'/option/xem/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
            );
            $maincontent[] = $content;
    }
    
    $data = new My_Data();
    $table = $data->createTable($title,$maincontent,"800px");
    echo $table;
    }    
    }
?>
