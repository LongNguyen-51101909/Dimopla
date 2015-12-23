<?php
echo $this->headMeta();
echo $this->headLink();

    $id_ctp = $this->param->getParam('mactp');
    $ctp = new Model_Caythanhpham();
    $caythanhpham = $ctp->getWhere($id_ctp)[0];
    if($caythanhpham['MaKho']!=null)
    {
        echo "<div class='long_message'>";
        echo "Không thể xóa cây thành phẩm đã nhập vào kho hàng!";
        echo "</div>";
    }
    else 
    {
        $cm = new Model_Caymoc();
        $caymoc = $cm->getWhere_ctp($id_ctp);
        $mamoc = $caymoc['MaMoc'];
        $update = array("MaCTP"=>null);
        $cm->update_data($mamoc, $update);

        $ctp->delete_ctp($id_ctp);
        
        $caymoc1 = $cm->getWhere($mamoc);

        if(array_key_exists('option',$this->param->getParams()))
            echo "<script>window.location.href='".HOST_PROJECT."/index/xem/caythanhpham/true';</script>";
        else
            echo "<script>window.location.href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$caymoc1['MaHopDong']."/right/lonhuom/malonhuom/".$caymoc1['MaLoNhuom']."/';</script>";
    }
    
    