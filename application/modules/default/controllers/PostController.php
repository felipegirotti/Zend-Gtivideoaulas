<?php

class PostController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */      
       $acl = new Zend_Acl();
       $visitante = new Zend_Acl_Role('visitante');
       $acl->addRole($visitante)           
           ->addRole(new Zend_Acl_Role('admin'), 'visitante')
           ->addRole(new Zend_Acl_Role('editor'), 'admin')
           ->add(new Zend_Acl_Resource('index'))
           ->add(new Zend_Acl_Resource('add'))
           ->add(new Zend_Acl_Resource('ver'))
           ->allow('visitante',array('index','ver'))
           ->allow('admin','add')
           ->deny('editor','add');
       
       $action = $this->_request->getActionName();
       if($acl->isAllowed('editor', $action)){
           echo 'Sim';
       }else{
           echo 'Não';
       }
       
    }

    public function indexAction()
    {
        // action body
        $post = new Default_Model_Post;
        $select = $post->select()->order('id Desc');
        $paginator = Zend_Paginator::factory($select);
        $paginator->setCurrentPageNumber($this->_getParam('page'));
        $paginator->setItemCountPerPage(2);
        $paginator->setPageRange(5);
        $paginator->setDefaultScrollingStyle('Elastic');
        Zend_View_Helper_PaginationControl::setDefaultViewPartial('paginator_control.phtml');
        
        $this->view->paginator = $paginator;
    }

    public function addAction()
    {
 
        $form = new Default_Form_Post();
        $model = new Default_Model_Post;
        $id = $this->_getParam('id');
        if($this->_request->isPost()){
 
            if($form->isValid($this->_request->getPost())){
 
                $data = $form->getValues();
                if($id){
                    $where = $model->getAdapter()->quoteInto('id = ?',$id);
                    $model->update($data,$where);
                }else{
                    $model->insert($data);
                }
 
                $this->_redirect('/post');
            }
 
        }elseif($id){
            $data = $model->busca($id);
            if(is_array($data)){
                $form->setAction('/post/add/id/' . $id);
                $form->populate($data);
            }
        }
 
        $this->view->form = $form;
    }

    public function verAction()
    {
        // action body
    }

    public function editorAction()
    {
        // action body
    }


}







