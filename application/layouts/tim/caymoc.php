<?php
echo $this->headMeta();
echo $this->headLink();

$form = new Form_Searchs_Caymoc();
echo $form;
if ($this->param->isPost()) {
    
    $cm = new Model_Caymoc();
    $loaivai = new Model_Loaivai();
    $cmchose = $this->param->getParam("caymoctim");
    $caymoc = $cm->getWhere($cmchose);
    
    if ($caymoc) {
        $title = array(
            "Mã Mộc",
            "Số Kg Sợi",
            "Loại Vải",
            "Số Mét Vải",
            "Tùy Chỉnh",
            "Nhập Kho",
        );
        $maincontent = array();
        
        // foreach ($caymoc as $item) {
        echo "</br>";
        $content = array(
            $caymoc['MaMoc'],
            $caymoc['SoKgSoi'],
            $loaivai->getWhere($caymoc['MaVai'])['TenLoaiVai'],
            $caymoc['SoMetVai'],
            '<a href="' . HOST_PROJECT . "/index/chinhsua/caymoc/true/macaymoc/" . $caymoc["MaMoc"] . '/option/caymoc">Sửa</a>&nbsp|&nbsp' . 
                '<a href="' . HOST_PROJECT . "/index/xoa/caymoc/true/macaymoc/" . $caymoc["MaMoc"] . '/option/xem/" onclick="return confirm(' . "'bạn có chắc muốn xóa ?'" . ')">Xóa</a>',
            $caymoc['MaKhoMoc']?"&nbspĐã Nhập":'<button type="button" class="btn btn-success"><a class ="axem" href="'.HOST_PROJECT."/index/xem/caymoc_detail/true/mamoc/".$caymoc['MaMoc'].'/">Nhập Kho</a>',
        );
        
        $maincontent[] = $content;
        // }
        
        $data = new My_Data();
        $table = $data->createTable($title, $maincontent, "800px");
        echo $table;
    }
}
?>
