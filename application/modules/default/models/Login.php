<?php

class Default_Model_Login{
    
    
    public static function login($login,$senha){
        $model = new self;
        $db = Zend_Db_Table::getDefaultAdapter();
        $adpter = new Zend_Auth_Adapter_DbTable($db,
                'tbl_usuario',
                'email',
                'senha',
                'SHA1(?)'
                );
        $select = $adpter->getDbSelect();
        $select->where('acesso = "Y"');
        $adpter->setIdentity($login);
        $adpter->setCredential($senha);
        
        $auth = Zend_Auth::getInstance();
        $result = $auth->authenticate($adpter);
        
        if($result->isValid()){
            $data = $adpter->getResultRowObject(null,'senha');
            $auth->getStorage()->write($data);
            
            return true;
        }else{
            return $model->getMessages($result);
        }
        
    }
    
    public function getMessages(Zend_Auth_Result $result){
        
        switch ($result->getCode()){
            case $result::FAILURE_IDENTITY_NOT_FOUND:
                $msg = 'Login não encontrado';
                break;
            case $result::FAILURE_IDENTITY_AMBIGUOUS:
                $msg = 'Login em duplicidade';
                break;
            case $result::FAILURE_CREDENTIAL_INVALID:
                $msg = 'Senha não corresponde';
                break;
            default:
                $msg = 'Login e/ou senha não encontrados';
        }
        return $msg;
    }
    
}
