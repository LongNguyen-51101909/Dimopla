<?php 
    echo $this->headMeta();
    echo $this->headLink();
    
    $form = new Form_Formmoi_Xemkhosoi();
    if($this->param->isPost())
    {
        $param = $this->param->getPost();

        $form->populate($param);
        echo $form;
    
        $makhohang = $this->param->getParam("mykhohang");
    
        $khosoi = new Model_Khosoi();
        $khosoiall = $khosoi->getWhere_khohang($makhohang);
    
        $data = new My_Data();
        $loaisoi = new Model_Loaisoi();
    
        $title = array("Loại Sợi", "Số tấn sợi", "Chọn");
        $content = array();
        foreach ($khosoiall as $item)
        {
            $button = "<a class ='thembutton' href='".HOST_PROJECT."/index/xem/caymoc/true/option/them/makhoisoi/".$item['MaKhoSoi']."/'/>Chọn</a>";
            $loaisoirow = $loaisoi->getWhere($item['MaSoi']);
            $subcontent = array($loaisoirow['TenSoi'],$item['SoTanSoi'],$button);
            $content[] = $subcontent;
        }
        $query = $data->createTable($title, $content, "300px");
        ?>
        <h1 class="title">Chọn Nguyên Liệu</h1>
        <?php 
        echo $query;
    }
    else{
        echo $form;
    }
    ?>
