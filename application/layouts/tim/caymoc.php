<?php
echo $this->headMeta();
echo $this->headLink();

$form = new Form_Searchs_Caymoc();
echo $form;
if ($this->param->isPost()) {
    
    $cm = new Model_Caymoc();
    $loaivai = new Model_Loaivai();
    $cmchose = $this->param->getParam("caymoctim");
    $caymocs = $cm->getWhereLike($cmchose);
    
    if ($caymocs) {
        $title = array(
            "Mã Mộc",
            "Số Kg Sợi",
            "Loại Vải",
            "Số Mét Vải",
            "Tùy Chỉnh",
            "Nhập Kho",
        );
        $maincontent = array();
        
        foreach ($caymocs as $item) {
            $loaivairow = $loaivai->getWhere($item['MaVai']);
            $chinhsua = '<a href="'.HOST_PROJECT."/index/chinhsua/caymoc/true/mamoc/".$item['MaMoc'].'/option/caymoc/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/caymoc/true/mamoc/".$item['MaMoc'].'/option/xem/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>';
            $button= "<a class ='thembutton' href='".HOST_PROJECT."/index/xem/caymoc_detail/true/mamoc/".$item['MaMoc']."'/>Nhập Kho</a>";
            $nhapkho = "";
            if($item['MaKhoMoc'])
                $nhapkho = "&nbspĐã Nhập";
            else
                $nhapkho =  $button;
            //$khohangrow = $khohang->getWhere($item['MaKho'])[0];
            $content = array(
                $item['MaMoc'],$item['SoKgSoi'],$loaivairow['TenLoaiVai'],
                $item['SoMetVai'],$chinhsua,$nhapkho
            );
            $maincontent[] = $content;
        }
        
        $data = new My_Data();
        $table = $data->createTable($title, $maincontent, "800px");
        echo $table;
    }
}
?>
