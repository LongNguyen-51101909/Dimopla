<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $data = new My_Data();
    $mau = $data->getOpMau();
    
    $form = new Form_Noindex_Lonhuom(); 
    $form->createLonhuom($mau);
    if($this->param->isPost())
    {
        
        $param = $this->param->getPost();
        
        $check = new Form_Valid_Lonhuom($param); // sua lai
        if($check->valid($param)){
            $mydate = Zend_Locale_Format::getDate($this->param->getParam("ngaynhuom"),array("date_format"=>"dd.MM.yyyy"));
            $date_str =  $mydate['year']."-". $mydate['month']."-". $mydate['day'];
            $data = array(
                "MaLoNhuom"=>null,
                "TenLoNhuom"=>$this->param->getPost("tenlonhuom"),
                "NgayNhuom"=>$date_str,
                "MaMau"=>$this->param->getPost("mamau"),
            );

            $lonhuom = new Model_Lonhuom();
            $lonhuom->insert_lonhuom($data);
            
            $lonhuom1 = $lonhuom->getAll();
            
            $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
            $_redirector->gotoUrl(HOST_PROJECT."/index/xem/lonhuom/true");
        }
        else{
            $form->populate($param);
            echo $form;
            echo "<div class='message'>";
            foreach($check->messages as $item)
            {
                echo $item."<br/>";
            }
            echo "</div>";
        }
    }
    else{
        echo $form;
    }
?>
