<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initDatabase() {
        $db = new Zend_Db_Adapter_Pdo_Mysql(array(
                    'host' => 'localhost',
                    'username' => 'root',
                    'password' => '',
                    'dbname' => 'acl'
                ));
        Zend_Registry::set('Zend_Db', $db);
    }

}