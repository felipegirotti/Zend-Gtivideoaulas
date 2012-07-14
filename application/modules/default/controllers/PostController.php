<?php

class PostController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
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


}



