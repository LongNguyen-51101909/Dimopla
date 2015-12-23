<?php
    echo $this->headMeta();
    echo $this->headLink();

    $cm= new Model_Caymoc();
    $caymoc = $cm->getWhere($this->param->getParam("macaymoc"));
?>

<?php 
if(count($caymoc)>0){
    ?>
    <div class = "qlykhachhang">
    <div class="panel panel-success">
      <div class="panel-heading" >
        <p style="font-size: 20px;"> Thông tin Hợp Đồng</p>
      </div>
    
      <!-- Table -->
      <table class="table">
        <thread>
            <tr>
                <th>Tên Cây Mộc</th>
                <th>Số Mét Vải</th>
                <th>Số Lượng Cây Mộc</th>
                <th>Loại Vải</th>                
                <th>Hợp Đồng</th>
                <th>Lô Nhuộm</th>      
                <th>Chỉnh Sửa</th>          
                
            </tr>
        </thread>
        <tbody>
            <?php 
                $data = new My_Data();
                $option = $data->getItemNameForCayMoc($caymoc['MaMoc']);

                echo "<tr>";                    
                echo "<td>".$caymoc['TenCayMoc']."</td>";
                echo "<td>".$caymoc['SoMetVai']."</td>";
                echo "<td>".$caymoc['SoLuongCayMoc']."</td>";
                echo "<td>".$option['TenLoaiVai']."</td>";                
                echo "<td>".$option['TenHopDong']."</td>";
                echo "<td>".$option['TenLoNhuom']."</td>";
                ?><td><a href="<?php echo HOST_PROJECT."/index/chinhsua/caymoc/true/macaymoc/".$caymoc['MaMoc']."/"?>">Chỉnh Sửa</a></td> <?php
                echo "</tr>";

            ?>
        </tbody>
      </table>
    </div>
    </div>   
<?php 

}
else 
    echo "Chưa tồn tại hợp đồng";
?>