<?php

class Default_Model_Post extends Zend_Db_Table_Abstract
{
    protected $_name = 'tbl_post';
    public function busca($id){
        try{
            $sql =  $this->select()
                        ->where('id =?', $id);
            $row = $this->fetchRow($sql);

            if(null !== $row)
                return $row->toArray();

        }catch(Exception $e){
            return $e->getMessage();
        }
    }

}

