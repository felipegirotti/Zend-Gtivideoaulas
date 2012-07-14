<?php

class Blog_IndexController extends Zend_Controller_Action{
        
    public function preDispatch() {
        parent::preDispatch();
        $auth = Zend_Auth::getInstance();
        if(!$auth->hasIdentity()){
            $this->_helper->FlashMessenger(array('erro'=>'Acesso negado'));
            $this->_redirect('/login');
        }
            
    }
    
    public function init(){
        
    }
    
    public function indexAction(){
        
        
        $blog = new Blog_Model_Blog;
        $form = new Blog_Form_Blog;
        $this->view->info = $blog->info();
        $this->view->form = $form;
    }
    
}
