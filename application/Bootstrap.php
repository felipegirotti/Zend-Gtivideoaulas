<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	protected function _initDoctype(){
		$this->bootstrap('view');
		$view = $this->getResource('view');
		
		//Doctype
		$view->Doctype('XHTML1_TRANSITIONAL');
		
		//Title
		$view->headTitle('Projeto Zend Framework')->setSeparator(' | ');
		
		//Css
		$view->headLink()->prependStylesheet('/css/style.css');
		
		//Js
		$view->headScript()->prependFile('https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
                
                //ADICIONADO O PAGINATOR_CONTROLS.PHTML PARA TODOS OS MODULOS
                $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
                $viewRenderer->initView();
                $viewRenderer->view->addBasePath(APPLICATION_PATH . '/layouts/');
                
                //SESSION
                Zend_Session::start();
	}
}

