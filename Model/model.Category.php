<?php

/**
 * Class Category
 */
class Category
{
    private $id;
    private $name;
    private $url;

    /**
     * Category constructor.
     * @param $id
     * @param $name
     * @param $url
     */
    public function __construct($id, $name, $url)
    {
        $this->id = $id;
        $this->name = $name;
        $this->url = $url;
    }

    /**
     * @return id de la catégorie (1..3)
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return le nom de la catégorie
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }




}
?>