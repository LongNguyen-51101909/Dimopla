<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Formmoi_Xemkhomoc(); //sua lai
    if($this->param->isPost())
    {        
        $param = $this->param->getPost();
        $form->populate($param);
        echo $form;
        
        $makho = $this->param->getParam("mykhohang");
        
        $caymoc = new Model_Caymoc();
        $caymocall = $caymoc->getWhere_khomoc($makho);
        
        $loaivai = new Model_Loaivai();
        $title = array("Mã Mộc","Loại Vải", "Số Mét Vải","Chọn");
        $content = array();
        foreach ($caymocall as $item)
        {
            $loaivairow = $loaivai->getWhere($item['MaVai']);
            $button= "<a class ='thembutton' href='".HOST_PROJECT."/index/xem/taoctp/true/mamoc/".$item['MaMoc']."/option/them/'/>Chọn</a>";
            $subcontent = array($item['MaMoc'],$loaivairow['TenLoaiVai'],$item['SoMetVai'],$button);
            $content[] = $subcontent;
        }
        
        $data = new My_Data();
        $query = $data->createTable($title, $content, "400px");
        echo $query;
    }
    else{
        echo $form;
    }
?>
