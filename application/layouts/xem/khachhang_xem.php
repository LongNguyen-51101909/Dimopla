<?php
    echo $this->headMeta();
    echo $this->headLink();

    $kh= new Model_Khachhang();
    $khachhang = $kh->getAll();
?>

<?php 
if($khachhang != false){
    
    $title = array("Tên Khách Hàng","Số Điện Thoại","Địa Chỉ","Tùy Chỉnh","Tạo Đơn Hàng");
    $maincontent = array();
    foreach ($khachhang as $item)
    {
        if($item['TenKhachHang']!='Công Ty')
        {
            $content = array(
                "<a href='".HOST_PROJECT."/index/main/khachhang_detail/true/makhachhang/".$item['MaKhachHang']."/'>".$item['TenKhachHang']."</a>",
        
                $item['SoDienThoai'],
                $item['DiaChi'],
                '<a href="'.HOST_PROJECT."/index/chinhsua/khachhang/true/makhachhang/".$item["MaKhachHang"].'/option/khachhang">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/khachhang/true/makhachhang/".$item["MaKhachHang"].'/option/xem/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
                '<button type="button" class="btn btn-success"><a class ="axem" href="'.HOST_PROJECT."/index/nhaplieu/donhang/true/makhachhang/".$item['MaKhachHang'].'/">Tạo Đơn Hàng</a>',
            );
            $maincontent[] = $content;
        }
    }
    
    $data = new My_Data();
    $table = $data->createTable($title,$maincontent,"800px");
    echo $table;
}    
    
else 
{
    echo "<div class='message'>";
    echo "Chưa tồn tại Khách Hàng";
    echo "</div>";
}
?>
