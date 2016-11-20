<?php

class Category implements JsonSerializable
{
    private $id;
    private $title;
    private $slug;


    public function __construct(array $datas) {
        if(isset($datas['id_category'])) $this->id = $datas['id_category'];
        if(isset($datas['title'])) $this->title = $datas['title'];
        if(isset($datas['slug'])) $this->slug = $datas['slug'];
    }

    function jsonSerialize() {
        $var = get_object_vars($this);
        foreach ($var as &$value) {
            if (is_object($value) && method_exists($value,'getJsonData')) {
                $value = $value->getJsonData();
            }
        }
        return $var;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }
}