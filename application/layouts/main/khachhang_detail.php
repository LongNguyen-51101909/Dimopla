<?php
    echo $this->headMeta();
    echo $this->headLink();

    $id_khachhang = $this->param->getParam("makhachhang");
    $kh= new Model_Khachhang();
    $khachhang = $kh->getWhere($id_khachhang)[0];
?>

<?php 
if(count($khachhang)>0){
    ?>
    <div class="left" id="mar">
        <h1 class="left">Thông Tin Khách Hàng</h1>
    
    <?php 
        $title = array("Tên Khách Hàng","Số Điện Thoại","Địa Chỉ","Tùy Chỉnh","Tạo Đơn Hàng");
        $content = array($khachhang['TenKhachHang'],
                        $khachhang['SoDienThoai'],
                        $khachhang['DiaChi'],
                        '<a href="'.HOST_PROJECT."/index/chinhsua/khachhang/true/makhachhang/".$khachhang["MaKhachHang"].'/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/khachhang/true/makhachhang/".$khachhang["MaKhachHang"].'/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
                        '<button type="button" class="btn btn-success"><a class ="axem" href="'.HOST_PROJECT."/index/nhaplieu/donhang/true/makhachhang/".$khachhang['MaKhachHang'].'/">Tạo Đơn Hàng</a>',
                    );
        $data = new My_Data();
        $table = $data->createTable($title,$content,"800px");
        echo $table;
        
    ?>
    <span style="clear:both"></span>
    </div>
    
  <span style="clear:both"></span>
  <div class="left">
        <h1 class="left">Thông tin Đơn Hàng</h1>
    
  <?php
  
    $data = new My_Data();
    $dh = $data->getDonHang($this->param->getParam("makhachhang"));
    if($dh){ 
        
        $title = array("Tên Đơn Hàng","Ngày Đặt","Tiền Đặt Hàng","Số Mét Vải","Tùy Chỉnh","Hợp Đồng Đã Tạo","Tạo Hợp Đồng");
        $content = array();
        
        foreach($dh as $item)
        {
            $subcontent = array();
            $mydate = Zend_Locale_Format::getDate($item['NgayDat'],array("date_format"=>"yyyy.MM.dd"));
            $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;

            $subcontent[] = $item['TenDonHang'];
            $subcontent[] = $date_str;
            $subcontent[] = $item['TienDatHang'];
            $subcontent[] = $item['SoMetVai'];
            $subcontent[] = '<a href="'.HOST_PROJECT."/index/chinhsua/donhang/true/makhachhang/".$item['MaKhachHang']."/madonhang/".$item['MaDonHang'].'/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/donhang/true/makhachhang/".$id_khachhang."/madonhang/".$item["MaDonHang"].'/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>';
            
            $hopdong = $data->getHopDong($item['MaDonHang']);
            $hd_old= "chưa tạo";   
                       
            if($hopdong){
                $hd_old= "";
                foreach ($hopdong as $hd_item)
                {
                    $hd_old .= "<a href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$hd_item['MaHopDong']."/'>".$hd_item['TenHopDong']."</a>,&nbsp<br>";
                }                    
            }
            $subcontent[] = $hd_old;
            $subcontent[] = '<button type="button" class="btn btn-success"><a class ="axem" href="'.HOST_PROJECT."/index/nhaplieu/hopdong/true/makhachhang/".$this->param->getParam("makhachhang")."/madonhang/".$item['MaDonHang'].'/">Tạo Hợp Đồng</a></button>';
            $content[] = $subcontent;
        }
        $data = new My_Data();
        $table = $data->createTable($title,$content,"1000px");
        echo $table;
    } 
    else
    {
        echo "<br>";
        echo "<div class='small_message'>";
        echo "Chưa tồn tại Đơn Hàng";
        echo "</div>";
    }
  ?>
    </div>
  
<?php 
}
else 
    echo "Chưa tồn tại khách hàng";
?>