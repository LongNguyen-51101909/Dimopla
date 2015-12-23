<?php
    echo $this->headMeta();
    echo $this->headLink();

    $m= new Model_Mau();
    $mauall = $m->getAll();

    if($mauall)
    {
        $maincontent = array();
        $title = array("Tên Màu","Công Thức","Tùy Chỉnh");
    
        $data = new My_Data();
    
        foreach ($mauall as $mau)
        {    
            $content = array(
                $mau['TenMau'], $mau['CongThuc'],
                '<a href="'.HOST_PROJECT."/index/chinhsua/mau/true/mamau/".$mau['MaMau'].'/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/mau/true/mamau/".$mau['MaMau'].'/option/mau/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
            );
            $maincontent[]=$content;
        }
        $table = $data->createTable($title, $maincontent,"500px");
        echo $table;
    }
    else
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Màu";
        echo "</div>";
    }
?>