<?php

/**
 * Base class for parsing RSS
 */
class RssParser extends Zend_Feed_Rss
{
    /**
     * @var CityDogItem[] $_rssItems
     */
    private $_rssItems = array();

    /**
     * Override constructor
     *
     * @param null                        $uri
     * @param null                        $string
     * @param Zend_Feed_Builder_Interface $builder
     *
     * @throws Zend_Feed_Exception
     */
    public function __construct(
        $uri = null, $string = null, Zend_Feed_Builder_Interface $builder = null
    ) {
        parent::__construct(
            $uri, $string, $builder
        );

        $rssItems = array();

        foreach($this as $rssItem) {
            $rssItems[] = new Application_Model_CityDogItem(
                $rssItem->title(),
                $rssItem->link(),
                $rssItem->description(),
                $rssItem->pubDate(),
                $this->formatCategoryToArray($rssItem)
            );
        }

        $this->setRssItems($rssItems);
    }

    /**
     * @return CityDogItem[]
     */
    public function getRssItems()
    {
        return $this->_rssItems;
    }

    /**
     * @param CityDogItem[] $rssItems
     */
    public function setRssItems($rssItems)
    {
        $this->_rssItems = $rssItems;
    }

    /**
     * format categories from DOMElement to array with link and url
     *
     * @param $rssItem
     *
     * @return array
     */
    private function formatCategoryToArray($rssItem)
    {
        $cateriesArray = array();

        if ($rssItem->category()) {
            if(is_array($rssItem->category())) {
                foreach($rssItem->category as $category) {
                    if(isset($category['domain'])) {
                        $cateriesArray[(string)$category] = $category['domain'];
                    }
                }
            } elseif(isset($rssItem->category['domain'])) {
                $cateriesArray[(string)$rssItem->category] = $rssItem->category['domain'];
            }
        }

        return $cateriesArray;
    }
}