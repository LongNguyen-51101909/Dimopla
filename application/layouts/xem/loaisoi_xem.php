<?php
    echo $this->headMeta();
    echo $this->headLink();

    $ls= new Model_Loaisoi();
    $loaisoiall = $ls->getAll();

    if($loaisoiall)
    {
        $maincontent = array();
        $title = array("Tên Sợi","Chỉnh Sửa");
    
        $data = new My_Data();
    
        foreach ($loaisoiall as $loaisoi)
        {
            
            $content = array(
                $loaisoi['TenSoi'], 
                '<a href="'.HOST_PROJECT."/index/chinhsua/loaisoi/true/masoi/".$loaisoi['MaSoi'].'/">Sửa</a>&nbsp|&nbsp'.'<a href="'.HOST_PROJECT."/index/xoa/loaisoi/true/masoi/".$loaisoi['MaSoi'].'/option/caymoc/" onclick="return confirm('."'bạn có chắc muốn xóa ?'".')">Xóa</a>',
            );
            $maincontent[]=$content;
        }
        $table = $data->createTable($title, $maincontent,"300px");
        echo $table;
    }
    else
    {
        echo "<div class='message'>";
        echo "Chưa tồn tại Loại Sợi";
        echo "</div>";
    }
?>