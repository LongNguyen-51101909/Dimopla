<?php
    echo $this->headMeta();
    echo $this->headLink();

    $khang= new Model_Khohang();
    $khohangall = $khang->getAll();
    
    if($khohangall)
    {
        $maincontent = array();
        $title = array("Tên Kho","Địa Chỉ","Số Điện Thoại","Loại Kho","Tùy Chỉnh",);
        
        $data = new My_Data();
        $lk = new Model_Loaikho();
        
        foreach ($khohangall as $khohang)
        {
            $loaikho = $lk->getWhere($khohang['MaLoaiKho']);
            $content = array(
                $khohang['TenKho'],$khohang['Diachi'], $khohang['sdt'],$loaikho['TenLoaiKho'],
                '<a href="'.HOST_PROJECT."/index/chinhsua/khohang/true/makho/".$khohang['MaKho']."/mactp/".$this->param->getParam("mactp").'"/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/khohang/true/makho/".$khohang['MaKho'].'/option/khohang/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
            );
            $maincontent[]=$content;
            
        }
        $table = $data->createTable($title, $maincontent,"800px");
        echo $table;
    
    }
    else 
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Kho Hàng";
        echo "</div>";
    }
    ?>