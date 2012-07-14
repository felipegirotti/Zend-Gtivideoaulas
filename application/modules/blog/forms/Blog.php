<?php

class Blog_Form_Blog extends Zend_Form{
    
    public function init(){
        $this->addElement('text','titulo',array('required'=>true));
        $this->addElement('submit','Salvar');
        $this->setMethod('post');
        
    }
    
}
