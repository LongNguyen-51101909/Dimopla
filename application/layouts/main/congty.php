<?php
    echo $this->headMeta();
    echo $this->headLink();

    $kh= new Model_Khachhang();
    $khachhang = $kh->getWhere_congty();
    $makhachhang = $khachhang['MaKhachHang'];
?>

<?php 
if(count($khachhang)>0){
    ?>
    
  <div class= "mar">
    <table style=" margin-bottom: 20px;">
        <tr>
            <td><h1 class="left">Đơn Hàng Công Ty</h1></td>
            <td style="padding-left: 30px; "><?php echo '<button type="button" class="btn btn-success"><a class ="axem" href="'.HOST_PROJECT."/index/nhaplieu/donhang/true/makhachhang/".$makhachhang.'/congty/true">Tạo Đơn Hàng</a>';?></td>
         </tr>
    </table>   
  <?php
  
    $data = new My_Data();
    $dh = $data->getDonHang($makhachhang);
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
            $subcontent[] = '<a href="'.HOST_PROJECT."/index/chinhsua/donhang/true/makhachhang/".$makhachhang."/madonhang/".$item['MaDonHang'].'/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/donhang/true/makhachhang/".$makhachhang."/madonhang/".$item["MaDonHang"].'/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>';
            
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
            $subcontent[] = '<button type="button" class="btn btn-success"><a class ="axem" href="'.HOST_PROJECT."/index/nhaplieu/hopdong/true/makhachhang/".$makhachhang."/madonhang/".$item['MaDonHang'].'/congty/true/">Tạo Hợp Đồng</a></button>';
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
{
    echo "<br>";
    echo "<div class='small_message'>";
    echo "Chưa tồn tại Đơn Hàng của công ty!";
    echo "</div>";
}
?>