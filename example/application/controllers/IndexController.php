<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function soapAction()
    {
        $this->getHelper('viewRenderer')->setNoRender(true);
        
        $server = new Zend_Soap_Server(null, array('uri'=>'http://localhost:81/example/index/soapAction'));
        
        $server->setClass('Example_Manager');

        $server->handle();
    }
}