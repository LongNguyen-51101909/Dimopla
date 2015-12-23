<?php
    echo $this->headMeta();
    echo $this->headLink();

    $hd= new Model_Hopdong();
    $id_hopdong = $this->param->getParam("mahopdong");
    $hopdong = $hd->getWhereIdHopDong($id_hopdong);
?>

<?php 
if(count($hopdong)>0){
    echo '<div class="main">';
    echo '<div class = "left">';
    echo '<h1 class="title">Thông Tin Hợp Đồng</h1>';
    $title = array("Tên Hợp Đồng","Tạo Cây Mộc");
    $content = array(
        "<a href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$hopdong['MaHopDong']."/right/hopdong'>".$hopdong['TenHopDong']."</a>",
        
        '<button type="button" class="btn btn-success"><a class ="axem" href="'.HOST_PROJECT."/index/nhaplieu/caymoc/true/mahopdong/".$hopdong['MaHopDong'].'/">Tạo Cây Mộc</a></button>'
    );
    $data = new My_Data();
    $table = $data->createTable($title,$content,"400px");
    echo $table;
    
    ?>
    
    <?php 
    $data = new My_Data();
    //echo $this->param->getParam("makhachhang");
    $cm = $data->getCayMoc($this->param->getParam("mahopdong"));
    if($cm){
        $title = array("Cây Mộc","Lô Nhuộm","Cây Thành Phẩm","Kho Hàng","Đơn Xuất");
        $maincontent = array();
        
        foreach($cm as $item)
        {
            $content = array();
            //$content[] = "<a href='".HOST_PROJECT."/index/main/caymoc_detail/true/macaymoc/".$item['MaMoc']."/'>".$item['TenCayMoc']."</a>";
            $content[] = "<a href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$id_hopdong."/right/caymoc/macaymoc/".$item['MaMoc']."/'>".$item['TenCayMoc']."</a>";
        
            // Lô Nhuộm
            if($item['MaLoNhuom'] == null)
            {
                $content[] = '<button type="button" class="btn btn-success"><a class ="axem" href="'.HOST_PROJECT."/index/nhaplieu/lonhuom/true/mamoc/".$item['MaMoc']."/mahopdong/".$this->param->getParam("mahopdong").'\">Tạo Lô Nhuộm</a></button>';
            }
            else 
            {
                $ln = new Model_Lonhuom();                        
                $lonhuom = $ln->getWhere($item['MaLoNhuom']);
                //$content[] = "<a href='".HOST_PROJECT."/index/main/lonhuom_detail/true/malonhuom/".$lonhuom[0]['MaLoNhuom']."/'>".$lonhuom[0]['TenLoNhuom']."</a>";
                $content[] = "<a href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$id_hopdong."/right/lonhuom/malonhuom/".$lonhuom[0]['MaLoNhuom']."/'>".$lonhuom[0]['TenLoNhuom']."</a>";
                
                // Cây Thành Phẩm 
                if($item['MaCTP'] == null)
                {
                    $content[] = '<button type="button" class="btn btn-success"><a class ="axem" href="'.HOST_PROJECT."/index/nhaplieu/caythanhpham/true/mamoc/".$item['MaMoc']."/mahopdong/".$this->param->getParam("mahopdong").'\">Tạo Cây Thành Phẩm</a>';
                }
                else 
                {
                        $ctp = $data->getCayTP($item['MaCTP']);
                        //$content[] = "<a href='".HOST_PROJECT."/index/main/ctp_detail/true/mactp/".$item['MaCTP']."/'>".$ctp[0]['TenCTP']."</a>";
                        $content[] = "<a href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$id_hopdong."/right/caythanhpham/mactp/".$item['MaCTP']."/'>".$ctp[0]['TenCTP']."</a>";
                                   
                        if($ctp[0]['MaKho'] == null)
                        {
                           $content[] = '<button type="button" class="btn btn-success"><a class ="axem" href="'.HOST_PROJECT."/index/nhaplieu/chonkhohang/true/mactp/".$ctp[0]['MaCTP']."/mahopdong/".$this->param->getParam("mahopdong").'\">Chọn kho hàng</a></button>';
                        }
                        else
                        {
                               $kho = new Model_Khohang();
                               $kho1 = $kho->getWhere($ctp[0]['MaKho']);
                               //$content[] = "<a href='".HOST_PROJECT."/index/main/kho_detail/true/mactp/".$item['MaCTP']."/makho/".$kho1[0]['MaKho']."/'>".$kho1[0]['TenKho']."</a>";
                               $content[] = "<a href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$id_hopdong."/right/khohang/mactp/".$item['MaCTP']."/makho/".$kho1[0]['MaKho']."/'>".$kho1[0]['TenKho']."</a>";
                               if($ctp[0]['MaDonXuat'] == null)
                               {
                                   $content[] = '<button type="button" class="btn btn-success"><a class ="axem" href="'.HOST_PROJECT."/index/nhaplieu/donxuat/true/mactp/".$ctp[0]['MaCTP']."/mahopdong/".$this->param->getParam("mahopdong").'/">Tạo Đơn Xuất</a></button>';
                               }
                               else 
                               {
                                   $dx = new Model_Donxuat();
                                   $donxuat = $dx->getWhere($ctp[0]['MaDonXuat']);
                                   //$content[] = "<a href='".HOST_PROJECT."/index/main/donxuat_detail/true/madonxuat/".$donxuat[0]['MaDonXuat']."/'>".$donxuat[0]['TenDonXuat']."</a>";
                                   $content[] = "<a href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$id_hopdong."/right/donxuat/madonxuat/".$donxuat[0]['MaDonXuat']."/'>".$donxuat[0]['TenDonXuat']."</a>";
                               }
                        }
                }
            }
        $maincontent[] =$content;
        }
        
        $data = new My_Data();
        $table = $data->createTable($title,$maincontent,"800px");
        echo $table;
    }
    
    echo '</div>';
    ?>
    
  
    
    
   
   <div class = "right">
    <div class="title">
    <?php 
        if($this->param->getParam("right")==null||$this->param->getParam("right")=="hopdong")
        {
            echo '<h1 class="title">Thông Tin Hợp Đồng</h1>';
            $title = array("Tên Hợp Đồng","Mô Tả","Ngày Ký",
                            "Số Tấn Sợi","Thành Tiền","Màu",
                            "Đơn Hàng","Loại Vải","Nhà Cung Cấp","Tùy Chỉnh","Tạo Cây Mộc");
            
            $data = new My_Data();
            
            $mydate = Zend_Locale_Format::getDate($hopdong['NgayKy'],array("date_format"=>"yyyy.MM.dd"));
            $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
            
            $option = $data->getItemNameForContract($hopdong['MaHopDong']);
            $chinhsua = '<a href="'.HOST_PROJECT."/index/chinhsua/hopdong/true/mahopdong/".$hopdong['MaHopDong'].'/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/hopdong/true/mahopdong/".$hopdong['MaHopDong'].'/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>';
            $button = '<button type="button" class="btn btn-success"><a class ="axem" href="'.HOST_PROJECT."/index/nhaplieu/caymoc/true/mahopdong/".$hopdong['MaHopDong'].'/">Tạo Cây Mộc</a></button>';
            $content = array($hopdong['TenHopDong'],$hopdong['MoTa'],$date_str,$hopdong['SoTanSoi'],
                             $hopdong['ThanhTien'],$option['TenMau'],$option['TenDonHang'],$option['TenLoaiVai'],
                             $option['TenNhaCungCap'],$chinhsua,$button
                            );
                
            $table = $data->createRightTable($title, $content,"450px");
            echo $table;
        }
        else 
        {
            $right = $this->param->getParam("right");
            if($right == "caymoc")
            {
                echo '<h1 class="title">Thông Tin Cây Mộc</h1>';
                $title = array("Tên Cây Mộc","Số Mét Vải","Số Lượng Cây Mộc",
                    "Loại Vải","Thuộc Hợp Đồng","Lô Nhuộm","Tùy Chỉnh");
                
                
                $data = new My_Data();
                $cm= new Model_Caymoc();
                $caymoc = $cm->getWhere($this->param->getParam("macaymoc"));
                $option = $data->getItemNameForCayMoc($caymoc['MaMoc']);
                
                $content = array(
                    $caymoc['TenCayMoc'],$caymoc['SoMetVai'],$caymoc['SoLuongCayMoc'],
                    $option['TenLoaiVai'],$option['TenHopDong'],$option['TenLoNhuom'],
                   '<a href="'.HOST_PROJECT."/index/chinhsua/caymoc/true/mahopdong/".$id_hopdong."/macaymoc/".$caymoc['MaMoc']."/".'/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/caymoc/true/mamoc/".$caymoc['MaMoc'].'/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
                );
                $table = $data->createRightTable($title, $content,"450px");
                echo $table;
            }
            
            if($right == "lonhuom")
            {
                echo '<h1 class="title">Thông Tin Lô Nhuộm</h1>';
                $title = array("Tên Lô Nhuộm","Ngày Nhuộm","Màu","Tùy Chỉnh",);
                
                $data = new My_Data();
                $ln= new Model_Lonhuom();
                $id_lonhuom = $this->param->getParam("malonhuom");
                $lonhuom = $ln->getWhere($id_lonhuom);
                $mydate = Zend_Locale_Format::getDate($lonhuom[0]['NgayNhuom'],array("date_format"=>"yyyy.MM.dd"));
                $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
                    
                $content = array(
                    $lonhuom[0]['TenLoNhuom'], $date_str, $data->getNameMau($lonhuom[0]['MaMau']),
                    '<a href="'.HOST_PROJECT."/index/chinhsua/lonhuom/true/mahopdong/".$id_hopdong."/malonhuom/".$lonhuom[0]['MaLoNhuom'].'/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/lonhuom/true/malonhuom/".$lonhuom[0]['MaLoNhuom'].'/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
                );
                $table = $data->createRightTable($title, $content,"450px");
                echo $table;
            }
            
            if($right == "caythanhpham")
            {
                echo '<h1 class="title">Thông Tin Cây Thành Phẩm</h1>';
                $title = array("Cây Thành Phẩm","Số Mét Vải","Tên Kho","Tên Đơn Xuất","Tùy Chỉnh",);
                
                $data = new My_Data();
                $ctp= new Model_Caythanhpham();
                $caytp = $ctp->getWhere($this->param->getParam("mactp"))[0];

                $options = $data->getItemNameForCTP($caytp['MaCTP']);
                
                $content = array(
                    $caytp['TenCTP'], $caytp['SoMetVai'], $options['TenKho'],$options['TenDonXuat'],
                    '<a href="'.HOST_PROJECT."/index/chinhsua/caytp/true/mahopdong/".$id_hopdong."/mactp/".$caytp['MaCTP'].'/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/caytp/true/mactp/".$caytp['MaCTP'].'/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
                );
                $table = $data->createRightTable($title, $content,"450px");
                echo $table;
            }
            
            if($right == "khohang")
            {
                echo '<h1 class="title">Thông Tin Kho Hàng</h1>';
                $title = array("Tên Kho","Địa Chỉ","Số Điện Thoại","Tùy Chỉnh",);
                
                $data = new My_Data();
                $khang= new Model_Khohang();
                $khohang = $khang->getWhere($this->param->getParam("makho"))[0];
                
                $content = array(
                    $khohang['TenKho'],$khohang['Diachi'], $khohang['sdt'],
                    '<a href="'.HOST_PROJECT."/index/chinhsua/chonkhohang/true/mahopdong/".$id_hopdong."/makho/".$khohang['MaKho']."/mactp/".$this->param->getParam("mactp").'"/">Chọn Kho Khác</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/chonkhohang/true/mahopdong/".$id_hopdong."/mactp/".$this->param->getParam("mactp")."/makho/".$khohang['MaKho'].'/" onclick="return confirm('."'bạn có chắc muốn Hủy ?'".')">Hủy Nhập Kho</a>',
                );
                $table = $data->createRightTable($title, $content,"450px");
                echo $table;
                //require_once APPLICATION_PATH.'/layouts/chinhsua/khohang.php';
            }
            
            if($right == "donxuat")
            {
                echo '<h1 class="title">Thông Tin Đơn Xuất</h1>';
                $title = array("Tên Đơn Xuất","Ngày Xuất","Thuộc Hợp Đồng","Tùy Chỉnh",);
                
                $data = new My_Data();
                $dx= new Model_Donxuat();
                $donxuat = $dx->getWhere($this->param->getParam("madonxuat"))[0];
                
                $mydate = Zend_Locale_Format::getDate($donxuat['NgayXuat'],array("date_format"=>"yyyy.MM.dd"));
                $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
                
                $hd = new Model_Hopdong();
                $myhopdong = $hd->getWhereIdHopDong($donxuat['MaHopDong']);
                
                $content = array(
                   $donxuat['TenDonXuat'],$date_str, $myhopdong['TenHopDong'],
                    '<a href="'.HOST_PROJECT."/index/chinhsua/donxuat/true/mahopdong/".$id_hopdong."/madonxuat/".$donxuat['MaDonXuat'].'/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/donxuat/true/mahopdong/".$id_hopdong."/madonxuat/".$donxuat['MaDonXuat'].'/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
                );
                $table = $data->createRightTable($title, $content,"450px");
                echo $table;
            }
        }
    ?>
    
    
    </div>
   </div>
   
   <div class="clear"></div>
   </div>
   </div>
<?php 
    
}
else 
    echo "Chưa tồn tại hợp đồng";
?>