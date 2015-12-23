<?php
    echo $this->headMeta();
    echo $this->headLink();

    $ncc= new Model_Nhacungcap();
    $nhacungcapall = $ncc->getAll();

    if($nhacungcapall)
    {
        $maincontent = array();
        $title = array("Nhà Cung Cấp","Số Điện Thoại","Địa Chỉ","Fax","Nợ","Tùy Chỉnh",);
    
        $data = new My_Data();
    
        foreach ($nhacungcapall as $nhacungcap)
        {
    
            $content = array(
                $nhacungcap['TenNhaCungCap'], $nhacungcap['Sdt'], $nhacungcap['DiaChi'],$nhacungcap['Fax'],$nhacungcap['No'],
                '<a href="'.HOST_PROJECT."/index/chinhsua/nhacungcap/true/mancc/".$nhacungcap['MaNhaCungCap'].'/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/nhacungcap/true/mancc/".$nhacungcap['MaNhaCungCap'].'/option/ncc/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
            );
            $maincontent[]=$content;
        }
        $table = $data->createTable($title, $maincontent,"700px");
        echo $table;
    }
    else
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Nhà Cung Cấp";
        echo "</div>";
    }
?>
