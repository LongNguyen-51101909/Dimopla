<?php
echo $this->headMeta();
echo $this->headLink();

    $mamau = $this->param->getParam('mamau');
    
    $hd = new Model_Hopdong();    
    $hopdong = $hd->getWhere_mau($mamau);

    if($hopdong)
    {
        echo "<div class='long_message'>";
        echo "Không thể xóa màu vải đã được dùng trong hợp đồng!";
        echo "</div>";
    }
    else 
    {
        $ln = new Model_Lonhuom();
        $lonhuom = $ln->getWhere_mau($mamau);
        if($lonhuom)
        {
            echo "<div class='long_message'>";
            echo "Không thể xóa màu vải đã được dùng trong lô nhuộm!";
            echo "</div>";
        }
        else 
        {
            $mau = new Model_Mau();
            $mau->delete_mau($mamau);
            echo "<script>window.location.href='".HOST_PROJECT."/index/xem/mau/true';</script>";
        }
    }
    
    