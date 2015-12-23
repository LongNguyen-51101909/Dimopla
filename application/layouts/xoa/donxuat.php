<?php
echo $this->headMeta();
echo $this->headLink();

    $madonxuat = $this->param->getParam('madonxuat');
    $mahopdong = $this->param->getParam('mahopdong');
    
    $ctp = new Model_Caythanhpham();
    $caythanhpham = $ctp->getWhere_donxuat($madonxuat)[0];
    $update = array("MaDonXuat"=>null);
    $ctp->update_data($caythanhpham['MaCTP'], $update);
    
    $dx = new Model_Donxuat();
    $dx->delete_donxuat($madonxuat);
    
    if(array_key_exists('option',$this->param->getParams()))
        echo "<script>window.location.href='".HOST_PROJECT."/index/xem/donxuat/true';</script>";
    else
        echo "<script>window.location.href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$mahopdong."/right/khohang/mactp/".$caythanhpham['MaCTP']."/makho/".$caythanhpham['MaKho']."/';</script>";
    
    
    