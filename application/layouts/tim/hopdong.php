<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Searchs_Hopdong();
    echo $form;
    if($this->param->isPost())
    {
        $model = new Model_Hopdong();
        $key = $this->param->getParam("key");
        $dataSearch = $model->searchByKey($key);
        
        if($dataSearch != false){
    
            $title = array("Mã Hợp Đồng","Ngày Mua","Mã Sợi","Mã Kho","Số Tấn Sợi","Tùy Chỉnh");
            
            $maincontent = array();
            foreach ($dataSearch as $item)
            {
            $content = array(
                $item['MaHopDong'],
                $item['NgayMua'],
                $item['MaSoi'],
                $item['MaKho'],
                $item['MaKho'],
                $item['SoTanSoi'],
            );
            $maincontent[] = $content;
    }
    
    $data = new My_Data();
    $table = $data->createTable($title,$maincontent,"800px");
    echo $table;
    }    
    }
?>
