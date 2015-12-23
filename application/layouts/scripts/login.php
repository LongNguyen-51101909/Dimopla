<?php 
    echo $this->headMeta();
    echo $this->headLink();
    
    $form = new Form_Login();    
    
    if($this->param->isPost())
    {
        $authTable = new Zend_Auth_Adapter_DbTable();
        $authTable->setTableName("thanhvien")
                  ->setIdentityColumn("Ten")
                  ->setCredentialColumn("MatKhau");
        
        
         $fname = $this->param->getPost("username");
         $fpass = $this->param->getPost("password");
        echo "<pre>";
        print_r($this->param);
        echo "</pre>";
        if($fname && $fpass)
        {
            $authTable->setIdentity($fname)
                      ->setCredential($fpass);
            $authTable->getDbSelect();

            $auth = Zend_Auth::getInstance();
            $result = $auth->authenticate($authTable);
            
            if($result->isValid())
            {
                $user = $authTable->getResultRowObject(null,array("MatKhau"));
                $auth->getStorage()->write($user);
                $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                $_redirector->gotoUrl(HOST_PROJECT.'/index/main');
                //$this->_redirect('/index/main');   
            }
            else 
            {
                $_redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                $_redirector->gotoUrl(HOST_PROJECT);
                //$this->_redirect('/default/index');
                echo "wrong";
            }
         }
        
    }
    else
        echo $form;

?>
