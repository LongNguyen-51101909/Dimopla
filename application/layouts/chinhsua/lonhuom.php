<?php
    echo $this->headMeta();
    echo $this->headLink();

    $id_ln = $this->param->getParam('malonhuom');
    $id_hopdong =$this->param->getParam('mahopdong');
    $fupdate = new Form_Update_Lonhuom();
    $fupdate->createForm($id_ln);
    
    if($this->param->isPost()){
            $param = $this->param->getPost();
            
            $check = new Form_Valid_Lonhuom($param);
          
            if($check->valid($param))
            {
                $mydate = Zend_Locale_Format::getDate($this->param->getParam("ngaynhuom"),array("date_format"=>"dd.MM.yyyy"));
                $date_str =  $mydate['year']."-". $mydate['month']."-". $mydate['day'];
                $data = array(
                    "MaLoNhuom"=>$id_ln,
                    "TenLoNhuom"=>$this->param->getParam("tenlonhuom"),
                    "NgayNhuom" => $date_str,
                    "MaMau" => $this->param->getParam("mamau"),
                );
                $kh = new Model_Lonhuom();
                $kh->update_data($id_ln, $data);
                //echo "<script>window.location.href='".HOST_PROJECT."/index/main/lonhuom_detail/true/malonhuom/".$id_ln."/';</script>";
                if(array_key_exists('option',$this->param->getParams()))
                    echo "<script>window.location.href='".HOST_PROJECT."/index/xem/lonhuom/true';</script>";
                else
                    echo "<script>window.location.href='".HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$id_hopdong."/right/lonhuom/malonhuom/".$id_ln."/';</script>";
                
            }
            else 
            {
                echo $fupdate;
                foreach($check->messages as $item)
                {
                    echo $item."<br/>";
                }
                echo "</div>";
            }
        }
        else
        {
            echo $fupdate;
        }