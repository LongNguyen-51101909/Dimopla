<?php
echo $this->headMeta();
echo $this->headLink();

    $id_khohang = $this->param->getParam('chonkhohang');
    
    $id_ctp = $this->param->getParam('mactp');
    $ctp = new Model_Caythanhpham();
    $caythanhpham = $ctp->getWhere($id_ctp)[0];
    
    if($caythanhpham['MaDonXuat']!=null)
    {
        echo "<div class='long_message'>";
        echo "Không thể hủy nhập kho vì đã tạo đơn xuất!";
        echo "</div>";
    }
    else 
    {
        $update = array("MaKho"=>null);
        $ctp->update_data($id_ctp, $update);

        if(array_key_exists('option',$this->param->getParams()))
            echo "<script>window.location.href='".HOST_PROJECT."/index/xem/khohang/true';</script>";
        else
            echo "<script>window.location.href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$this->param->getParam('mahopdong')."/right/caythanhpham/mactp/".$id_ctp."';</script>";
    }
    
    