<?php
echo $this->headMeta();
echo $this->headLink();

$form = new Form_Searchs_Caythanhpham();
echo $form;

if ($this->param->isPost()) {
    
    $cm = new Model_Caythanhpham();
    $loaivai = new Model_Loaivai();
    $lonhuom = new Model_Lonhuom();
    $mau = new Model_Mau();
    $caymoc = new Model_Caymoc();
    
    $cmchose = $this->param->getParam("caythanhphamtim");
    $caythanhpham = $cm->getWhereLike($cmchose);
    
    if ($caythanhpham) {
        $title = array(
            "Mã Cây TP",
            "Loại Vải",
            "Màu Vải",
            "Số Mét Vải",
            "Tùy Chỉnh",
            "Nhập Kho"
        );
        $maincontent = array();
        foreach ($caythanhpham as $item) {
            $caymocrow = $caymoc->getWhere_ctp($item['MaCTP']);
            $loaivairow = $loaivai->getWhere($caymocrow['MaVai']);
            $lonhuomrow = $lonhuom->getWhere($caymocrow['MaLoNhuom']);
            
            $maurow = $mau->getWhereIdMau($lonhuomrow['MaMau']);
            $chinhsua = '<a href="' . HOST_PROJECT . "/index/chinhsua/caytp/true/mactp/" . $item['MaCTP'] . '/option/caytp/">Sửa</a>&nbsp|&nbsp' . '<a href="' . HOST_PROJECT . "/index/xoa/caytp/true/mactp/" . $item['MaCTP'] . '/option/ctp/" onclick="return confirm(' . "'bạn có chắc muốn xóa ?'" . ')">Xóa</a>';
            $button = "<a class ='thembutton' href='" . HOST_PROJECT . "/index/xem/ctp_detail/true/mactp/" . $item['MaCTP'] . "'/>Nhập Kho</a>";
            $content = array(
                $item['MaCTP'],
                $loaivairow['TenLoaiVai'],
                $maurow['TenMau'],
                $item['SoMetVai'],
                $chinhsua,
                $button
            );
            $maincontent[] = $content;
        }
        
        $data = new My_Data();
        $table = $data->createTable($title, $maincontent, "800px");
        echo $table;
    }
}
?>
