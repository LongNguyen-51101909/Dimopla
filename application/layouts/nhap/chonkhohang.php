<?php 
    echo $this->headMeta();
    echo $this->headLink();

    $form = new Form_Noindex_ChonKhoHang(); 
    $id_ctp =$this->param->getParam("mactp");
    if($this->param->isPost())
    {
        
        $param = $this->param->getPost();
        
        $ctp = new Model_Caythanhpham();
        $ctp1= $ctp->getWhere($this->param->getParam("mactp"));
        $data_update = array();
        $data_update['MaKho'] = $param["chonkhohang"];

        $ctp->update_data($id_ctp, $data_update);
        $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
        $_redirector->gotoUrl(HOST_PROJECT."/index/main/hopdong_detail/true/mahopdong/".$this->param->getParam("mahopdong")."/right/khohang/mactp/".$id_ctp."/makho/".$param["chonkhohang"]."/");
        }
    else{
        echo $form;
    }
?>
