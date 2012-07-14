<?php

class Default_Form_Login extends Zend_Form{
    
    public function init(){
        
        $this->addElement('text','login',array(
            'label' => 'Login',
            'required' => true,
            'filters' => array('StringTrim')
        ));
        $this->addElement('password','senha',array(
            'label' => 'Senha',
            'required' => true,
            'filters' => array('StringTrim')
        ));
        $this->addElement('submit','Logar');
        
        $this->setMethod('post');
    }
}
