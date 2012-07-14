<?php

class LoginController extends Zend_Controller_Action{
    
    public function init(){
              
    }
    
    public function indexAction(){
        $form = new Default_Form_Login;
        $request = $this->_request;
        
        if($request->isPost()){
            $data = $request->getPost();
            if($form->isValid($data)){
                $data = $form->getValues();
                $login = Default_Model_Login::login($data['login'], $data['senha']);
                if($login === true){
                    $this->_redirect('/blog');
                }else{
                    $this->_helper->FlashMessenger(array('erro'=>$login));
                    $form->populate($data);
                }
            }
            
            
        }
        
        
        $this->view->form = $form;
        
        
    }
    
    
    public function sairAction(){
        
        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();
        $this->_redirect('/login');
    }
    
    
    
}
