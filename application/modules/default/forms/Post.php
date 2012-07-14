<?php

class Default_Form_Post extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
 
        $titulo = new  Zend_Form_Element_Text('titulo');
        $titulo->setLabel('Título')
               ->setRequired(true)
               ->setAllowEmpty(true)
               ;
               
 
        $texto = new Zend_Form_Element_Textarea('texto');
        $texto->setLabel('Texto:')
            ->setRequired(true);
 
        $submt = new Zend_Form_Element_Submit('Enviar');
        $submt->setLabel('Enviar');
        
        
        
        
        $this->addElements(array($titulo,$texto,$submt));
        
        
        
        $this->setAction('/post/add');
    }


}

