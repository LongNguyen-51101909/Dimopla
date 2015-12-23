<?php
echo $this->headMeta();
echo $this->headLink();

    $masoi = $this->param->getParam('masoi');
    
    $lv = new Model_Loaivai();    
    $loaivai = $lv->getWhere_loaisoi($masoi);

    if($loaivai)
    {
        echo "<div class='long_message'>";
        echo "Không thể xóa loại sợi đã được dùng để dệt vải!";
        echo "</div>";
    }
    else 
    {
        $loaisoi = new Model_Loaisoi();
        $loaisoi->delete_loaisoi($masoi);
        echo "<script>window.location.href='".HOST_PROJECT."/index/xem/loaisoi/true';</script>";
    }
    
    