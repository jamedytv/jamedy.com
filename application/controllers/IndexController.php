<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $x = new Application_Model_YoutubeDataFill();
        $x->getResults();
    }


}

