<?php
class My_Data
{
    public function getDonHang($id_khachhang)
    {
        // echo $id_khachhang;
         $hd = new Model_Donhang();
         $hopdong = $hd->getWhereIdKH($id_khachhang);        
         return $hopdong;
    }
    
    public function getHopDong($id_donhang)
    {
        $hd = new Model_Hopdong();
        $hopdong = $hd->getWhereIdDH($id_donhang);
        return $hopdong;
    }
    
    public function getCayMoc($id_hopdong)
    {
        $cm = new Model_Caymoc();
        $caymoc = $cm->getWhere_IdHopdong($id_hopdong);
        return $caymoc;
    }
    
    public function getCayTP($id_ctp)
    {
        $ctp = new Model_Caythanhpham();
        $caytp = $ctp->getWhere($id_ctp);
        return $caytp;
    }
    
    public function getLoNhuom($id_caymoc)
    {
        $ctp = new Model_Caythanhpham();
        $caytp = $ctp->getWhere_IdCM($id_caymoc);
        return $caytp;
    }
    
    public function getOpMau()
    {       
        $mau = new Model_Mau();
        $mau1 = $mau->getAll();
        $opMau = array();
   
        foreach ($mau1 as $item)
        {
            $opMau[$item['MaMau']] = $item['TenMau'];
        }
        
        return $opMau;
    }
    
    //--------------------------------------------------------
    
    public function isDupNameLoaiSoi($name)
    {
        $ls = new Model_Loaisoi();
        $loaisoi = $ls->getAll();
        foreach ($loaisoi as $key=>$item)
        {
            if($key == 'TenSoi' && $item == $name)
                return false;
        }
        return true;
    }
    
    public function isDupNameLoaiVai($name)
    {
        $ls = new Model_Loaivai();
        $loaivai = $ls->getAll();
        foreach ($loaivai as $key=>$item)
        {
            if($key == 'TenLoaiVai' && $item == $name)
                return true;
        }
        return false;
    }
    
    public function isDupNameNCC($name)
    {
        $ls = new Model_Loaisoi();
        $loaisoi = $ls->getAll();
        foreach ($loaisoi as $key=>$item)
        {
            if($key == 'TenNhaCungCap' && $item == $name)
                return false;
        }
        return true;
    }
    
    public function isDupNameMau($name)
    {
        $mu = new Model_Mau();
        $mau = $mu->getAll();
        foreach ($mau as $key=>$item)
        {
            if($key == 'TenMau' && $item == $name)
                return true;
        }
        return false;
    }
    
    public function getOptionLoaiSoi()
    {
        $ls= new Model_Loaisoi();
        $arr = $ls->getAll();
        $options = array();
        foreach ($arr as $item)
        {
            $options[$item['MaSoi']] = $item['TenSoi'];
        }
        return $options;
    }
    
    
    public function getFirstOpVaiFromKhoSoi($khoall)
    {
        if(is_array($khoall))
        {
            $kho = reset($khoall);
            
            if(is_array($kho))
            {
                $vai = reset($kho);
                return $vai;
            }
        }
        return array();
    }
    
    public function getFirstOpSoiFromKhoSoi($kho)
    {
        $loaisoi = new Model_Loaisoi();
        if($kho)
        {
            foreach ($kho as $loaisoiall)
            {
                $opsoi = array();
                foreach ($loaisoiall as $key => $item)
                {
                    $loaisoirow = $loaisoi->getWhere($key);
                    $opsoi[$key]=$loaisoirow['TenSoi'];
                }
                return $opsoi;
            }
        }
        else 
            return array();
    }
    
    public function getNguyenLieu()
    {
        $lv = new Model_Loaivai();
        $khosoi = new Model_Khosoi();
        $makho = $khosoi->getIdKho();
//         echo "<pre>";
//         print_r($makho);
//         echo "</pre>";
        
        $option = array();
        foreach ($makho as $item)
        {
            $khohangrow = $khosoi->getWhere_khohang($item['MaKho']);//1,5
            $opsoi = array();
            foreach ($khohangrow as $khitem)
            {
                
                $opvai = array();
                $loaivai = $lv->getWhere_loaisoi($khitem['MaSoi']);
                foreach ($loaivai as $itemvai)
                {
                    $opvai[$itemvai['MaVai']] = $itemvai['TenLoaiVai'];
                }
                $opsoi[$khitem['MaSoi']] = $opvai;
            }
            $option[$item['MaKho']] = $opsoi;
        }
       
        return $option;
    }
    
    
    public function getOpLoaiVaiWithIdSoi($idloaisoi)
    {

        $lv = new Model_Loaivai();
        $loaivai = $lv->getWhere_loaisoi($idloaisoi);
        $options = array();
        foreach ($loaivai as $item)
        {
            $options[$item['MaVai']] = $item['TenLoaiVai'];
        }
        return $options;
    }
    
    public function getOptionLoaiVai()
    {
        $lv= new Model_Loaivai();
        $arr = $lv->getAll();
        $options = array();
        foreach ($arr as $item)
        {
            $name = $item['MaVai'];
            $options[$name] = $item['TenLoaiVai'];
        }
        return $options;
    }
    
    public function getOptionMau()
    {
        $lv= new Model_Mau();
        $arr = $lv->getAll();
        $options = array();
        foreach ($arr as $item)
        {
            $name = $item['MaMau'];
            $options[$name] = $item['TenMau'];
        }
        return $options;
    }
    
    public function getOptionKhoHang()
    {
        $model= new Model_Khohang();
        $arr = $model->getAll();
        $options = array();
        foreach ($arr as $item)
        {
            $name = $item['MaKho'];
            $options[$name] = $item['TenKho'];
        }
        return $options;
    }
    
    public function getOpKhoMoc()
    {
        
        $lk= new Model_Loaikho();
        $makho = $lk->getWhere_Tenkho("Kho Mộc")['MaLoaiKho'];
        
        $kho = new Model_Khohang();
        $khohang = $kho->getWhere_loaikho($makho);
        
        $options = array();
        foreach ($khohang as $item)
        {
            $options[$item['MaKho']] = $item['TenKho'];
        }
        
        return $options;
        
    }
    
    public function getOptionNCC()
    {
        $lv= new Model_Nhacungcap();
        $arr = $lv->getAll();
        $options = array();
        foreach ($arr as $item)
        {
            $name = $item['MaNhaCungCap'];
            $options[$name] = $item['TenNhaCungCap'];
        }
        return $options;
    }
    
    public function getOpHopdong($masoi, $makho, $mancc)
    {
        $op = array();
        
        $soi = new Model_Loaisoi();
        $loaisoi = $soi->getWhere($masoi);
        $op['tensoi'] = $loaisoi['TenSoi'];
        
        $kho = new Model_Khohang();
        $khohang = $kho->getWhere($makho);
        $op['tenkho'] = $khohang['TenKho'];
        
        $ncc = new Model_Nhacungcap();
        $myncc = $ncc->getWhere($mancc);
        $op['tenncc'] = $myncc['TenNhaCungCap'];

        return $op;
        
        
        
    }
    
    public function getOpKhoSoi()
    {
        $lk= new Model_Loaikho();
        $makho = $lk->getWhere_Tenkho("Kho Sợi")['MaLoaiKho'];
        
        $kho = new Model_Khohang();
        $khohang = $kho->getWhere_loaikho($makho);
        
        $options = array();
        foreach ($khohang as $item)
        {
            $options[$item['MaKho']] = $item['TenKho'];
        }
        
        return $options;
    }
    
    public function getOpKhoWithName($name)
    {
        $lk= new Model_Loaikho();
        $makho = $lk->getWhere_Tenkho($name)['MaLoaiKho'];
    
        $kho = new Model_Khohang();
        $khohang = $kho->getWhere_loaikho($makho);
    
        $options = array();
        foreach ($khohang as $item)
        {
            $options[$item['MaKho']] = $item['TenKho'];
        }
    
        return $options;
    }
    
    public function getItemNameForContract($mahopdong)
    {
        $hd= new Model_Hopdong();
        $hopdong = $hd->getWhereIdHopDong($mahopdong);
        
        $options = array();

        $mau = new Model_Mau();
        $mau1 = $mau->getWhereIdMau($hopdong['MaMau']);
        $options['TenMau']=$mau1['TenMau'];
        
        $dh = new Model_Donhang();
        $donhang= $dh->getWhere($hopdong['MaDonHang']);
        $options['TenDonHang']=$donhang['TenDonHang'];
        
        $lv  = new Model_Loaivai();
        $loaivai = $lv->getWhere($hopdong['MaLoaiVai']);
        $options['TenLoaiVai']=$loaivai['TenLoaiVai'];
        
        $ncc = new Model_Nhacungcap();
        $ncc1 = $ncc->getWhere($hopdong['MaNhaCungCap']);
        $options['TenNhaCungCap']=$ncc1['TenNhaCungCap'];
        
        return $options;
    }
    
    public function getNameMau($mamau)
    {
        $mau = new Model_Mau();
        $mau1= $mau->getWhereIdMau($mamau);
        return $mau1['TenMau'];
    }
    
    public function createTable($title,$content, $width)
    {
        $script = 
        "<table class=\"table\"  style=\"width:".$width."; border: 2px solid #ddd;\">
        <thread>
        <tr class='success'>";
        foreach ($title as $item)
        {
            $script.= "<th>".$item."</th>";
        }
        $script.="</tr></thread><tbody>";

        $oneline = true;
        
        foreach($content as $item)
        {
            if(is_array($item))
                $oneline = false;
        }
        
        if($oneline)
        {
            $script.= "<tr>";
            foreach($content as $item)
            {   
                $script.= "<td>".$item."</td>";
            }
            $script.= "</tr></tbody></table>";
        }
        else 
        {
            foreach($content as $item)
            {   
                $i=0;
                $script.= "<tr style=\"border: 2px solid #ddd;\">";
                
                    foreach($item as $item1)
                    {
                        $i++;
                        $script.= "<td>".$item1."</td>";
                    }
                while($i<count($title)){$script.= "<td></td>"; $i++;}
                $script.= "</tr>";
            }
            $script.= "</tbody></table>";
        }
        return $script;
    }
    
    public function createRightTable($title,$content, $width)
    {
        $script =
        "<table class=\"table table-bordered\"  style=\"width:".$width."; border: 2px solid #ddd;\">
        <tbody>";
        
        foreach($title as $key => $item)
        {
            $script.= "<tr>";
            $script.= "<td width = '170px'><b>".$item."</b></td>";
            $script.= "<td style='padding-left:30px; '>".$content[$key]."</td>";
            $script.= "</tr>";
        }
        $script.= "</tbody></table>";
      
        return $script;
    }
    
    public function getOpHinhThuc()
    {
        $options = array();
        
        $ht = new Model_Hinhthuc();
        $hinhthuc = $ht->getAll();
        foreach ($hinhthuc as $key => $item)
        {
            $options[$item['MaHinhThuc']]=$item['TenHinhThuc'];
        }

        return $options;
    }
    
    public function getNameKhachHang($mahopdong)
    {
        $hd = new Model_Hopdong();
        $hopdong = $hd->getWhereIdHopDong($mahopdong);
        $madonhang = $hopdong['MaDonHang'];
        
        $dh = new Model_Donhang();
        $donhang = $dh->getWhere($madonhang);
        
        $kh= new Model_Khachhang();
        $khachhang = $kh->getWhere($donhang['MaKhachHang'])[0];
        
        return $khachhang['TenKhachHang'];
    }
    
    public function convertCurrency($item)
    {
        setlocale(LC_MONETARY, 'en_US');
        $original = array('value'=>$item,'precision'=>0,'symbol' => 'đ',);
        $money= new Zend_Currency($original);
        return $money;
    }
    
    public function getQLKho($makho)
    {
        $option = array();
        
        $title = array("Cây Thành Phẩm","Số Mét Vải","Số cây nhập kho", "Số cây xuất kho","Số cây còn lại",
                       "Người đặt hàng","Đơn xuất","Ngày Xuất","Số lượng xuất",);
        $option['title']= $title;
        
        $content = array();
        
        $ctp = new Model_Caythanhpham();
        $cm = new Model_Caymoc();
        $dx = new Model_Donxuat();
        
        $caythanhpham = $ctp->getWhere_khohang($makho);
        $i=0;
        foreach ($caythanhpham as $item)
        {
            $subcontent = array();
            $subcontent[] = $item['TenCTP'];
            $subcontent[] = $item['SoMetVai'];
            
            $caymoc = $cm->getWhere_ctp($item['MaCTP']);
            
            $tenkhachhang = $this->getNameKhachHang($caymoc['MaHopDong']);
            $slnhap = $caymoc['SoLuongCayMoc'];
            $madonxuat = $item['MaDonXuat'];
            
            $subcontent[] = $slnhap;
            
            if($madonxuat == null){
                $subcontent[] = "0";
                $subcontent[] = $slnhap;
                $subcontent[] = $tenkhachhang;
                $subcontent[] = "Chưa xuất";
                $subcontent[] = "";
                $subcontent[] = "";
            }
            else 
            {
                $subcontent[] = "0";
                $subcontent[] = $slnhap;
                $subcontent[] = $tenkhachhang;
                
                $donxuat = $dx->getWhere($madonxuat)[0];
                $mydate = Zend_Locale_Format::getDate($donxuat['NgayXuat'],array("date_format"=>"yyyy.MM.dd"));
                $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
                
                $subcontent[] = $donxuat['TenDonXuat'];
                $subcontent[] = $date_str;
                $subcontent[] = "0";
                
            }
            $content[] = $subcontent;
        }
        
        $option['content'] = $content;
        
        return $option;
        
    }
    
    public function getOpKhoHang()
    {
        $lk = new Model_Loaikho();
        $loaikho = $lk->getAll();
        
        $option = array();
        
        foreach ($loaikho as $item)
        {
            $option[$item['MaLoaiKho']]= $item['TenLoaiKho'];
        }
        return $option;
    }
    
    public function getTongNo()
    {
        $ncc = new Model_Nhacungcap();
        $nhacungcap = $ncc->getAll();
        $tongno = 0;
        foreach ($nhacungcap as $item)
        {
            $tongno+= $item['No'];
        }
        
        return $tongno;
    }
    
    public function IsTPExit($mactp)
    {
        
    }
    
}