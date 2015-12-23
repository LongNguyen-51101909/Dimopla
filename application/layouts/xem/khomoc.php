<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Formmoi_Xemkhomoc(); 
    if($this->param->isPost())
    {
        $param = $this->param->getPost();
        $form->populate($param);
        echo $form;
        
        $makho = $this->param->getParam("mykhohang");
        
        $khomoc = new Model_Khomoc();
        $khomocall = $khomoc->getWhere_khohang($makho);
        
        $data = new My_Data();
        $loaivai = new Model_Loaivai();
        
        $title = array("Loại Vải","Số Cây Mộc", "Tổng Số Mét");
        $content = array();
        foreach ($khomocall as $item)
        {
            $loaivairow = $loaivai->getWhere($item['MaVai']);

            $subcontent = array($loaivairow['TenLoaiVai'],$item['SoCayMoc'],$item['TongSoMet']);
            $content[] = $subcontent;
        }
        $query = $data->createTable($title, $content, "400px");
        echo $query;
    }
    else{
        echo $form;
    }
?>
