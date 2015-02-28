<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Load RssParser class
     *
     * @throws Zend_Exception
     */
    protected function _initRssParser()
    {
        Zend_Loader::loadClass('RssParser');
    }

    /**
     * initialization constant config
     */
    public function _initConfig()
    {
        Zend_Registry::set(
            'constants',
            new Zend_Config_Ini(
                APPLICATION_PATH . '/configs/application.ini',
                'constants'
            )
        );
    }

    /**
     * initialization main partial view with object variable
     */
    public function _initView()
    {
        $view = new Zend_View();
        $view->partialLoop()->setObjectKey('object');

        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
        $viewRenderer->setView($view);
    }
}

