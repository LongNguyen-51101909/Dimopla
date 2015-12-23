<?php
echo $this->headMeta();
echo $this->headLink();

    $mancc = $this->param->getParam('mancc');
    $hd = new Model_Hopdong();
    $hopdong = $hd->getWhere_ncc($mancc);
    if($hopdong)
    {
        echo "<div class='long_message'>";
        echo "Không thể xóa Nhà Cung Cấp đã ký hợp đồng!";
        echo "</div>";
    }
    else 
    {
        $ncc = new Model_Nhacungcap();
        $ncc->delete_nhacungcap($mancc);

        echo "<script>window.location.href='".HOST_PROJECT."/index/xem/nhacungcap/true';</script>";
    }
    
    