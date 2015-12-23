<?php
echo $this->headMeta();
echo $this->headLink();

    $id_kho = $this->param->getParam('makho');
    $ctp = new Model_Caythanhpham();
    $caytp = $ctp->getWhere_khohang($id_kho);
    if($caytp)
    {
        echo "<div class='long_message'>";
        echo "Không thể xóa Kho hàng đã được sử dụng!";
        echo "</div>";
    }
    else 
    {
        $khohang = new Model_Khohang();
        $khohang->delete_kho($id_kho);

        echo "<script>window.location.href='".HOST_PROJECT."/index/xem/khohang/true';</script>";
    }
    
    