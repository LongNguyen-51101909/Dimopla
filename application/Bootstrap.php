<?php
Zend_Session::start();
// Khai báo đối tương Zend_Acl
$acl = new My_Acl();
// Khai báo Aclplugin cho front Controller biết
$frontController = Zend_Controller_Front::getInstance();
$frontController->registerPlugin(new My_Aclplugin($acl));

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    
    protected function _initAutoLoad()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
                'namespace' => '',
                'basePath' => dirname(__FILE__),
        ));
        return $autoloader;
    }
    
    protected function _initDB()
    {
        $db = Zend_Db::factory('Pdo_Mysql',array(
                'host'=>'localhost',
                'username'=>'root',
                'password'=>'',
                'dbname'=>'det1',
                'charset'=>'utf8'
        ));
        $db->setFetchMode(Zend_Db::FETCH_BOTH);
        Zend_Db_Table::setDefaultAdapter($db);
        return $db;
    }
    
    function _initView(){
        $view = new Zend_View();
        $view->headMeta()->appendHttpEquiv('Content-Type','text/html; charset = utf-8');        
        
        $view->headLink()->appendStylesheet(HOST_PROJECT."/public/css/bootstrap.min.css");
        $view->headLink()->offsetSetStylesheet("2",HOST_PROJECT."/public/css/bootstrap-theme.css");
        $view->headLink()->offsetSetStylesheet("3",HOST_PROJECT."/public/css/style.css");

        $view->headLink()->appendStylesheet(HOST_PROJECT.'/public/css/jquery-ui.css');
        $view->headLink()->appendStylesheet(HOST_PROJECT.'/public/css/chartist.min.css');
        
        $view->headScript()->appendFile(HOST_PROJECT."/public/js/jquery-1.11.3.min.js");
        
        $view->headScript()->offsetSetFile("2",HOST_PROJECT."/public/js/bootstrap.min.js");
        $view->headScript()->offsetSetFile("3",HOST_PROJECT."/public/js/myscript.js");
        $view->headScript()->offsetSetFile("4",HOST_PROJECT."/public/js/jquery-ui.min.js");
        $view->headScript()->offsetSetFile("5",HOST_PROJECT."/public/js/chartist.min.js");
    }   

}

