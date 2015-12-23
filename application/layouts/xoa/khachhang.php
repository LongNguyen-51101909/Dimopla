<?php
echo $this->headMeta();
echo $this->headLink();

    $id_khachhang = $this->param->getParam('makhachhang');
    $dh = new Model_Donhang();
    $donhang = $dh->getWhereIdKH($id_khachhang);
    if($donhang)
    {
        echo "<div class='long_message'>";
        echo "Không thể xóa khách hàng đã đặt Đơn Hàng!";
        echo "</div>";
    }
    else 
    {
        $kh = new Model_Khachhang();
        $khachhang = $kh->delete_khachhang($id_khachhang);

        if(array_key_exists('option',$this->param->getParams()))
            echo "<script>window.location.href='".HOST_PROJECT."/index/xem/';</script>";
        else
            echo "<script>window.location.href='".HOST_PROJECT."/index/main/';</script>";
    }
    
    