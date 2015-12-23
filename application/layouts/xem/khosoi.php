<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Formmoi_Xemkhosoi(); 
    if($this->param->isPost())
    {
        $param = $this->param->getPost();
        $form->populate($param);
        echo $form;
        
        $makho = $this->param->getParam("mykhohang");
        
        $khosoi = new Model_Khosoi();
        $khosoiall = $khosoi->getWhere_khohang($makho);
        
        $data = new My_Data();
        $loaisoi = new Model_Loaisoi();
        
        $title = array("Loại Sợi", "Số tấn sợi");
        $content = array();
        foreach ($khosoiall as $item)
        {
            $loaisoirow = $loaisoi->getWhere($item['MaSoi']);
            $subcontent = array($loaisoirow['TenSoi'],$item['SoTanSoi']);
            $content[] = $subcontent;
        }
        $query = $data->createTable($title, $content, "250px");
        echo $query;
    }
    else{
        echo $form;
    }
?>
