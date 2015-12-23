<?php
    $myparam = $this->param->getParams();
    
    if(array_key_exists('khachhang',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/khachhang.php';
    }
    else if(array_key_exists('donhang',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/donhang.php';
    }
    else if(array_key_exists('hopdong',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/hopdong.php';
    }
    else if(array_key_exists('makhoisoi',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/caymoc.php';
    }
    else if(array_key_exists('caymoc',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/chonnguyenlieu.php';
    }
    else if(array_key_exists('lonhuom',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/lonhuom.php';
    }
    else if(array_key_exists('taoctp',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/xem/taoctp.php';
    }
    else if(array_key_exists('caythanhpham',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/caythanhpham.php';
    }
    else if(array_key_exists('donxuat',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/donxuat.php';
    }
    else if(array_key_exists('khohang',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/khohang.php';
    }
    else if(array_key_exists('hoadon',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/hoadon.php';
    }
    else if(array_key_exists('loaivai',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/loaivai.php';
    }
    else if(array_key_exists('loaisoi',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/loaisoi.php';
    }
    else if(array_key_exists('mau',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/mau.php';
    }
    else if(array_key_exists('nhacungcap',$myparam))
    {
        require_once APPLICATION_PATH.'/layouts/nhap/nhacungcap.php';
    }
    else
        {
            require_once APPLICATION_PATH.'/layouts/nhap/khachhang.php';
        }