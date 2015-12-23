<?php
class My_Acl extends Zend_Acl
{
  public function __construct()
   {
      // Add Role
      $this->addRole(new Zend_Acl_Role('user'))
           ->addRole(new Zend_Acl_Role('moderator'))
           ->addRole(new Zend_Acl_Role('admin'));
           
      // Add Resource
      // Các Controller trong Module Default
      $this->addResource(new Zend_Acl_Resource('index'));
      // Các Controller trong Module Admin 
      $this->addResource(new Zend_Acl_Resource('main'));
      
      // Phân quyền
      // User
      $this->allow('user','index','index');// Vào tất cả các action của C-Index trong M-Default
      $this->allow('user','index','xem');
      $this->allow('user','index','main');
      $this->allow('user','index','logout');
      
      // Moderator
      $this->allow('moderator','index','index');// Vào tất cả các action của C-Index trong M-Default
      $this->allow('moderator','index','xem');
      $this->allow('moderator','index','main');
      $this->allow('moderator','index','chinhsua');
      $this->allow('moderator','index','xoa');
      $this->allow('moderator','index','nhaplieu');
      $this->allow('moderator','index','logout');
//       $this->allow('moderator','index',null); // Vào tất cả các action của C-Index trong M-Default
//       $this->allow('moderator','main',array('index','insert','update')); // Vào được các action index, insert, update của C-Index trong M-Admin
      // Admin
      $this->allow('admin',null,null); // Vào được tất cả
      
  //    $this->allow(null,'default:index','notpermission');// Tất cả các Role đều vào được action notpermission của C-Index trong M-Default
      
   }
}