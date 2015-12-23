<?php
    echo $this->headMeta();
    echo $this->headLink();

    $ln= new Model_Lonhuom();
    $lonhuom = $ln->getWhere($this->param->getParam("malonhuom"));
?>

<?php 
if(count($lonhuom)>0){
    ?>
    <div class = "qlykhachhang">
    <div class="panel panel-success">
      <div class="panel-heading" >
        <p style="font-size: 20px;"> Thông Tin Lô Nhuộm</p>
      </div>    
    
      <!-- Table -->
      <table class="table">
        <thread>
            <tr>
                <th>Tên Lô Nhuộm</th>
                <th>Ngày Nhuộm</th>
                <th>Màu</th>
                <th>Chỉnh Sửa</th>
            </tr>
        </thread>
        <tbody>
            <?php 
                $data = new My_Data();
                foreach($lonhuom as $item)
                {
                    $mydate = Zend_Locale_Format::getDate($item['NgayNhuom'],array("date_format"=>"yyyy.MM.dd"));
                    $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
                    echo "<tr>";
                    echo "<td>".$item['TenLoNhuom']."</td>";
                    echo "<td>".$date_str."</td>";
                    echo "<td>".$data->getNameMau($item['MaMau'])."</td>";
                    ?><td><a href="<?php echo HOST_PROJECT."/index/chinhsua/lonhuom/true/malonhuom/".$item['MaLoNhuom']."/"?>">Chỉnh Sửa</a></td> <?php
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
    echo "Chưa tồn tại Lô Nhuộm";
?>