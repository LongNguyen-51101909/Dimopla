<?php
    echo $this->headMeta();
    echo $this->headLink();

    $ctp= new Model_Caythanhpham();
    $caythanhpham = $ctp->getWhere($this->param->getParam("mactp"));

?>

<?php 
if(count($caythanhpham)>0){
    ?>
    <div class = "qlykhachhang">
    <div class="panel panel-success">
      <div class="panel-heading" >
        <p style="font-size: 20px;"> Thông Tin Cây Thành Phẩm</p>
      </div>
    
      <!-- Table -->
      <table class="table">
        <thread>
            <tr>
                <th>Tên Cây Thành Phẩm</th>
                <th>Số Mét Vải</th>
                <th>Tên Kho</th>
                <th>Tên Đơn Xuất</th>
                <th>Chỉnh Sửa</th>
            </tr>
        </thread>
        <tbody>
            <?php
                $data = new My_Data(); 
                foreach($caythanhpham as $item)
                {
                    echo "<tr>";
                    $options = $data->getItemNameForCTP($item['MaCTP']);
                    echo "<td>".$item['TenCTP']."</td>";
                    echo "<td>".$item['SoMetVai']."</td>";
                    echo "<td>".$options['TenKho']."</td>";
                    echo "<td>".$options['TenDonXuat']."</td>";
                    ?><td><a href="<?php echo HOST_PROJECT."/index/chinhsua/caytp/true/mactp/".$item['MaCTP']."/"?>">Chỉnh Sửa</a></td> <?php
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
    echo "Chưa tồn tại Cây Thành Phẩm";
    echo "</div>";
}
?>