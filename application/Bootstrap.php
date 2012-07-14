<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	protected function _initDoctype(){
		$this->bootstrap('view');
		$view = $this->getResource('view');
		
		//Doctype
		$view->Doctype('XHTML1_TRANSITIONAL');
		
		//Title
		$this->view->headTitle('Projeto Zend Framework')->setSeparator(' | ');
		
		//Css
		$this->view->headLink()->prependStylesheet('/css/style.css');
		
		//Js
		$this->view->headScript()->prependFile('https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
                
                //SESSION
                Zend_Session::start();
	}
}

