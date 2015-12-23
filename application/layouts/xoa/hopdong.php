<?php
echo $this->headMeta();
echo $this->headLink();

    $id_hopdong = $this->param->getParam('mahopdong');
    
    $cm = new Model_Caymoc();
    $caymoc = $cm->getWhere_IdHopdong($id_hopdong);

    if($caymoc)
    {
        echo "<div class='long_message'>";
        echo "Không thể xóa Hợp Đồng đã tạo Cây Mộc !";
        echo "</div>";
    }
    else 
    {
        $hd = new Model_Hopdong();
        
        $id_donhang =$hd->getWhereIdHopDong($id_hopdong)['MaDonHang'];
        $dh = new Model_Donhang();
        $id_khachhang = $dh->getWhere($id_donhang)['MaKhachHang'];
        $hopdong = $hd->delete_hopdong($id_hopdong);
        

        if(array_key_exists('option',$this->param->getParams()))
            echo "<script>window.location.href='".HOST_PROJECT."/index/xem/hopdong/true';</script>";
        else
            echo "<script>window.location.href='".HOST_PROJECT."/index/main/khachhang_detail/true/makhachhang/".$id_khachhang."/';</script>";
    }
    
    