<?php
echo $this->headMeta();
echo $this->headLink();

    $id_vai = $this->param->getParam('maloaivai');
    $loaivai = new Model_Loaivai();
    
    $cm = new Model_Caymoc();
    $caymoc = $cm->getWhere_loaivai($id_vai);

    if($caymoc)
    {
        echo "<div class='long_message'>";
        echo "Không thể xóa Loại vải đã được dùng để dệt!";
        echo "</div>";
    }
    else 
    {
        $loaivai->delete_loaivai($id_vai);
        echo "<script>window.location.href='".HOST_PROJECT."/index/xem/loaivai/true';</script>";
    }
    
    