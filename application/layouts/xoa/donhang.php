<?php
echo $this->headMeta();
echo $this->headLink();

    $id_donhang = $this->param->getParam('madonhang');
    $id_khachhang = $this->param->getParam('makhachhang');
    $hd = new Model_Hopdong();
    $hopdong = $hd->getWhereIdDH($id_donhang);
    if($hopdong)
    {
        echo "<div class='long_message'>";
        echo "Không thể xóa Đơn Hàng đã tạo Hợp Đồng !";
        echo "</div>";
    }
    else 
    {
        $dh = new Model_Donhang();
        $donhang = $dh->delete_donhang($id_donhang);

        if(array_key_exists('option',$this->param->getParams()))
            echo "<script>window.location.href='".HOST_PROJECT."/index/xem/donhang/true';</script>";
        else
            echo "<script>window.location.href='".HOST_PROJECT."/index/main/khachhang_detail/true/makhachhang/".$id_khachhang."/';</script>";
    }
    
    