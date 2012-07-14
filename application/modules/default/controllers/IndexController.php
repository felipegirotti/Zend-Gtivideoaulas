<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
     
      $acl = new Zend_Acl;
	
	$recurso = new Zend_Acl_Resource('blog');
        $acl->add($recurso);
	//Herança
        $acl->add(new Zend_Acl_Resource('admin'), 'blog');
        $acl->addRole(new Zend_Acl_Role('guest'));
        
        $acl->allow('guest','blog');
        
        var_dump($acl->isAllowed('guest','admin'));
        
    }

    public function verAction()
    {
        // action body
    }
    
    

}



