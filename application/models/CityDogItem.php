<?php
/**
 * Model for one news from CityDog
 */

class Application_Model_CityDogItem {

    /**
     * @var string $_title
     */
    protected $_title;

    /**
     * @var string $_link
     */
    protected $_link;

    /**
     * @var string $_description
     */
    protected $_description;

    /**
     * @var string $_pubDate
     */
    protected $_pubDate;

    /**
     * @var array $_categories
     */
    protected $_categories;

    /**
     * Set all params for CityDogItem
     *
     * @param $_title
     * @param $_link
     * @param $_description
     * @param $_pubDate
     * @param $_categories
     */
    function __construct(
        $_title, $_link, $_description, $_pubDate, $_categories
    ) {
        $this->setTitle($_title);
        $this->setLink($_link);
        $this->setDescription($_description);
        $this->setPubDate($_pubDate);
        $this->setCategories($_categories);
    }

    /**
     * @return array
     */
    public function getCategories()
    {
        return $this->_categories;
    }

    /**
     * @param array $categories
     */
    public function setCategories($categories)
    {
        $this->_categories = $categories;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->_description = $description;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->_link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->_link = $link;
    }

    /**
     * @return string
     */
    public function getPubDate()
    {
        return $this->_pubDate;
    }

    /**
     * @param string $pubDate
     */
    public function setPubDate($pubDate)
    {
        $this->_pubDate = $pubDate;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }
} 