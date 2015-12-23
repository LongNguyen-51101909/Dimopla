<?php
    $myparam = $this->param->getParams();
    
    if(array_key_exists('khachhang',$myparam))
    {
        require_once 'khachhang_xem.php';
        ?><script>myFunction();</script><?php
    }
    else if(array_key_exists('donhang',$myparam))
    {
        require_once "donhang_xem.php";
    }
    else if(array_key_exists('hopdong',$myparam))
    {
        require_once "hopdong_xem.php";
    }
    else if(array_key_exists('caymoc',$myparam))
    {
        require_once "caymoc_xem.php";
    }
    else if(array_key_exists('caymoc_detail',$myparam))
    {
        require_once "caymoc_detail.php";
    }
    else if(array_key_exists('lonhuom',$myparam))
    {
        require_once "lonhuom_xem.php";
    }
    else if(array_key_exists('ctp_detail',$myparam))
    {
        require_once "ctp_detail.php";
    }
    else if(array_key_exists('caythanhpham',$myparam))
    {
        require_once "caythanhpham_xem.php";
    }
    else if(array_key_exists('donxuat',$myparam))
    {
        require_once "donxuat_xem.php";
    }
    else if(array_key_exists('khohang',$myparam))
    {
        require_once "khohang_xem.php";
    }
    else if(array_key_exists('hoadon',$myparam))
    {
        require_once "hoadon_xem.php";
    }
    else if(array_key_exists('loaivai',$myparam))
    {
        require_once "loaivai_xem.php";
    }
    else if(array_key_exists('loaisoi',$myparam))
    {
        require_once "loaisoi_xem.php";
    }
    else if(array_key_exists('mau',$myparam))
    {
        require_once "mau_xem.php";
    }
    else if(array_key_exists('nhacungcap',$myparam))
    {
        require_once "nhacungcap_xem.php";
    }
    else if(array_key_exists('khosoi',$myparam))
    {
        require_once "khosoi.php";
    }
    else if(array_key_exists('khomoc',$myparam))
    {
        require_once "khomoc.php";
    }
    else if(array_key_exists('khotp',$myparam))
    {
        require_once "khotp.php";
    }
    else
    {
        require_once 'khachhang_xem.php';
    }