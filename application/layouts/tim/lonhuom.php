<?php
echo $this->headMeta();
echo $this->headLink();

$form = new Form_Searchs_Lonhuom();
echo $form;
if ($this->param->isPost()) {
    $model = new Model_Lonhuom();
    $key = $this->param->getParam("key");
    $dataSearch = $model->searchByKey($key);
    
    if ($dataSearch != false) {
        
        $title = array(
            "Tên Lô Nhuộm",
            "Ngày Nhuộm",
            "Màu",
            "Tùy Chỉnh"
        );
        
        $data = new My_Data();
        
        $maincontent = array();
        foreach ($dataSearch as $item) {
            $mydate = Zend_Locale_Format::getDate($item['NgayNhuom'], array(
                "date_format" => "yyyy.MM.dd"
            ));
            $date_str = $mydate['day'] . "/" . $mydate['month'] . "/" . $mydate['year'];
            
            $cm = new Model_Caymoc();
            $caymoc = $cm->getWhere_lonhuom($item['MaLoNhuom']);
            // $tenlonhuom = "<a href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$caymoc['MaHopDong']."/right/lonhuom/malonhuom/".$item['MaLoNhuom']."/'>". $item['TenLoNhuom']."</a>";
            $content = array(
                $item['TenLoNhuom'],
                $date_str,
                $data->getNameMau($item['MaMau']),
                '<a href="' . HOST_PROJECT . "/index/chinhsua/lonhuom/true/malonhuom/" . $item['MaLoNhuom'] . '/option/lonhuom">Sửa</a>&nbsp|&nbsp' . '<a href="' . HOST_PROJECT . "/index/xoa/lonhuom/true/malonhuom/" . $item['MaLoNhuom'] . '/option/lonhuom" onclick="return confirm(' . "'bạn có chắc muốn xóa ?'" . ')">Xóa</a>'
            );
            $maincontent[] = $content;
        }
        
        $data = new My_Data();
        $table = $data->createTable($title, $maincontent, "800px");
        echo $table;
    }
}
?>
