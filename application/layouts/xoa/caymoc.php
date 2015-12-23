<?php
echo $this->headMeta();
echo $this->headLink();

    $id_moc = $this->param->getParam('mamoc');
    $cm = new Model_Caymoc();
    $caymoc = $cm->getWhere($id_moc);
    if($caymoc['MaLoNhuom']!=null)
    {
        echo "<div class='long_message'>";
        echo "Không thể xóa Cây Mộc đã tạo Lô Nhuộm!";
        echo "</div>";
    }
    else 
    {
        $caymoc1 = $cm->delete_caymoc($id_moc);

        if(array_key_exists('option',$this->param->getParams()))
            echo "<script>window.location.href='".HOST_PROJECT."/index/xem/caymoc/true';</script>";
        else
            echo "<script>window.location.href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$caymoc['MaHopDong']."/right/hopdong/';</script>";
    }
    
    