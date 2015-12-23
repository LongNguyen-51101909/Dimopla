<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Formmoi_Chonkhotp(); 
    if($this->param->isPost())
    {
        $param = $this->param->getPost();
        $form->populate($param);
        echo $form;
        
        $makho = $this->param->getParam("mykhohang");
        
        $khotp = new Model_KhoThanhPham();
        $khotpall = $khotp->getWhere_khohang($makho);
//         echo $makho;
//         echo "<pre>";
//         print_r($khotpall);
//         echo "</pre>";
        $data = new My_Data();
        $loaivai = new Model_Loaivai();
        $mau = new Model_Mau();
        if($khotpall)
        {
            $title = array("Loại Vải","Màu Vải", "Tổng Số Mét","Số Cây TP",);
            $content = array();
            foreach ($khotpall as $item)
            {
                $loaivairow = $loaivai->getWhere($item['MaVai']);
                $maurow = $mau->getWhereIdMau($item['MaMau']);
                $subcontent = array(
                    $loaivairow['TenLoaiVai'],$maurow['TenMau'],
                    $item['TongSoMet'],$item['SoCayTP']
                );
                $content[] = $subcontent;
            }
            $query = $data->createTable($title, $content, "450px");
            echo $query;
        }
        else 
        {
            echo "<div class='message'>";
            echo "Kho Thành Phẩm Trống!";
            echo "</div>";
        }
    }
    else{
        echo $form;
    }
?>
