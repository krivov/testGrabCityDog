<?php

/**
 * Class IndexController
 */
class IndexController extends Zend_Controller_Action
{
    /**
     * action for main page
     */
    public function indexAction()
    {
        //initialize rss object
        $rss = new RssParser(Zend_Registry::get('constants')->rssUrl);

        //send array with CityDogItem objects to view
        $this->view->items = $rss->getRssItems();
    }
}