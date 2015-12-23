<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Searchs_Lonhuom();
    echo $form;
    if($this->param->isPost())
    {
        $model = new Model_Lonhuom();
        $key = $this->param->getParam("key");
        $dataSearch = $model->searchByKey($key);
        
        if($dataSearch != false){
    
            $title = array("Mã Lô nhuộm","Tên Lô Nhuộm","Mã Màu","ngày Nhuộm","Tùy Chỉnh");
            
            $maincontent = array();
            foreach ($dataSearch as $item)
            {
            $content = array(
                $item['MaLoNhuom'],
                $item['TenLoNhuom'],
                $item['MaMau'],
                $item['NgayNhuom'],
            );
            $maincontent[] = $content;
    }
    
    $data = new My_Data();
    $table = $data->createTable($title,$maincontent,"800px");
    echo $table;
    }    
    }
?>
