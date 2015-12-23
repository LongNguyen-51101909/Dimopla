<?php
    echo $this->headMeta();
    echo $this->headLink();

    $dx= new Model_Donxuat();
    $donxuat = $dx->getWhere($this->param->getParam("madonxuat"));
//     echo "<pre>";
//     print_r($khachhang);
//     echo "</pre>";
?>

<?php 
if(count($donxuat)>0){
    ?>
<div class = "qlykhachhang">
<div class="panel panel-success">
  <div class="panel-heading">
    <h4> Thông Tin Đơn Xuất</h4>
  </div>

  <!-- Table -->
  <table class="table">
    <thread>
        <tr>
            <th>Tên Đơn Xuất</th>
            <th>Ngày Xuất</th>
            <th>Thuộc Hợp Đồng</th>
            <th>Chỉnh Sửa</th>
        </tr>
    </thread>
    <tbody>
        <?php 
            foreach($donxuat as $item)                    
            {
                echo "<tr>";
                $mydate = Zend_Locale_Format::getDate($item['NgayXuat'],array("date_format"=>"yyyy.MM.dd"));
                $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
                $hd = new Model_Hopdong();
                $hopdong = $hd->getWhereIdHopDong($item['MaHopDong']);
                echo "<td>".$item['TenDonXuat']."</td>";
                echo "<td>".$date_str."</td>";
                echo "<td>".$hopdong['TenHopDong']."</td>";
                ?><td><a href="<?php echo HOST_PROJECT."/index/chinhsua/donxuat/true/madonxuat/".$item['MaDonXuat']."/"?>">Chỉnh Sửa</a></td> <?php
                echo "</tr>";
            }
        ?>
    </tbody>
  </table>
</div>
</div>
<?php 
}
else 
{
    echo "<div class='message'>";
    echo "Chưa tồn tại Đơn Xuất";
    echo "</div>";
}
?>