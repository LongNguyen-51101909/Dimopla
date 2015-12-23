<?php
    echo $this->headMeta();
    echo $this->headLink();

    $khang= new Model_Khohang();
    $khohang = $khang->getWhere($this->param->getParam("makho"));
//     echo "<pre>";
//     print_r($khachhang);
//     echo "</pre>";
?>

<?php 
if(count($khohang)>0){
    ?>
<div class = "qlykhachhang">
<div class="panel panel-success">
  <div class="panel-heading">
    <h4> Thông Tin Kho Hàng</h4>
  </div>

  <!-- Table -->
  <table class="table">
    <thread>
        <tr>
            <th>Tên Kho</th>
            <th>Địa Chỉ</th>
            <th>Số Điện Thoại</th>
            <th>Chỉnh Sửa</th>
        </tr>
    </thread>
    <tbody>
        <?php 
            foreach($khohang as $item)                    
            {
                echo "<tr>";
                echo "<td>".$item['TenKho']."</td>";
                echo "<td>".$item['Diachi']."</td>";
                echo "<td>".$item['sdt']."</td>";
                ?><td><a href="<?php echo HOST_PROJECT."/index/chinhsua/khohang/true/makho/".$item['MaKho']."/mactp/".$this->param->getParam("mactp")."/"?>">Chỉnh Sửa</a></td> <?php
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
    echo "Chưa tồn tại Kho Hàng";
    echo "</div>";
}
?>