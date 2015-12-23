<?php
class My_Aclplugin extends Zend_Controller_Plugin_Abstract
 {
     protected $_acl;
     public function __construct($acl)
      {
         $this->_acl = $acl;  
      }
     public function preDispatch(Zend_Controller_Request_Abstract $request)
      {
          // Gọi chứng thực
          $auth = Zend_Auth::getInstance();
          if( $auth->hasIdentity() ) // Nếu có chứng thực
           { 
               // Lấy thông tin đã ghi vào session
               $infoUserData = $auth->getIdentity();
               // Lấy cấp độ người dùng
//                echo "<pre>";
//                print_r($infoUserData);
//                echo "</pre>";
               $level = $infoUserData->Level;
               // Tạo Role
               $role = "";
               switch($level)
                {
                   case 1: $role = "admin";break;
                   case 2: $role = "moderator"; break;
                   case 3: $role = "user";break;
                   default:$role = "user";
                }
              // Lấy Request
              // Module
             // $module = $request->getModuleName();
              // Controller
              $controller = $request->getControllerName();
              // Action 
              $action = $request->getActionName();
              
              // phân quyền
              
              
              //Tạo Resource
            //  $resource = $module.":".$controller;
              
              // Chuyển hướng người dùng nếu không được phép truy cập
              if( !$this->_acl->isAllowed($role,$controller,$action) )
               {                    
                    $request->setControllerName('index')
                            ->setActionName('notpermission');
               }
              
           }
      }
 }