<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Searchs_Donhang();
    echo $form;
    if($this->param->isPost())
    {
        $model = new Model_Donhang();
        $key = $this->param->getParam("key");
        $dataSearch = $model->searchByKey($key);
        
        if($dataSearch != false){
    
            $title = array("Mã Đơn Hàng","Tên Đơn Hàng","Ngày Đặt","Số Mét Vải","Tùy Chỉnh");
            
            $maincontent = array();
            foreach ($dataSearch as $item)
            {
            $content = array(
                $item['MaDonHang'],
                $item['TenDonHang'],
                $item['NgayDat'],
                $item['SoMetVai'],
                
            );
            $maincontent[] = $content;
    }
    
    $data = new My_Data();
    $table = $data->createTable($title,$maincontent,"800px");
    echo $table;
    }    
    }
?>
