<?php
echo $this->headMeta();
echo $this->headLink();

    $id_lonhuom = $this->param->getParam('malonhuom');
    $cm = new Model_Caymoc();
    $caymoc = $cm->getWhere_lonhuom($id_lonhuom);
    if($caymoc['MaCTP']!=null)
    {
        echo "<div class='long_message'>";
        echo "Không thể xóa Lô Nhuộm đã tạo Cây Thành Phẩm!";
        echo "</div>";
    }
    else 
    {
        $update = array("MaLoNhuom"=>null);
        $caymoc1 = $cm->update_data($caymoc['MaMoc'], $update);

        $ln = new Model_Lonhuom();
        $ln->delete_lonhuom($id_lonhuom);
        
        if(array_key_exists('option',$this->param->getParams()))
            echo "<script>window.location.href='".HOST_PROJECT."/index/xem/lonhuom/true';</script>";
        else
            echo "<script>window.location.href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$caymoc['MaHopDong']."/right/caymoc/macaymoc/".$caymoc['MaMoc']."/';</script>";
    }
    
    