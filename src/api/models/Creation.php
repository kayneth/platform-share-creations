<?php

class Creation implements JsonSerializable
{
    private $id;
    private $title;
    private $slug;
    private $file;
    private $link;
    private $description;
    private $createdAt;
    private $updatedAt;
    private $user;
    private $category;


    public function __construct(array $datas) {
        if(isset($datas['id_creation'])) $this->id = $datas['id_creation'];
        if(isset($datas['title'])) $this->title = $datas['title'];
        if(isset($datas['slug'])) $this->slug = $datas['slug'];
        if(isset($datas['file'])) $this->file = $datas['file'];
        if(isset($datas['link'])) $this->link = $datas['link'];
        if(isset($datas['description'])) $this->description = $datas['description'];
        if(isset($datas['created_at'])){$this->createdAt = $datas['created_at'];}else{$this->createdAt = new DateTime();}
        if(isset($datas['updated_at'])) $this->updatedAt = $datas['updated_at'];
        if(isset($datas['id_user'])) $this->user = $datas['id_user'];
        if(isset($datas['id_category'])) $this->category = $datas['id_category'];
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

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getFile() {
        return $this->file;
    }

    public function getLink() {
        return $this->link;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function getUser() {
        return $this->user;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
        return $this;
    }

    public function setFile($file) {
        $this->file = $file;
        return $this;
    }

    public function setLink($link) {
        $this->link = $link;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function setUser($user) {
        $this->user = $user;
        return $this;
    }

    public function setCategory($category) {
        $this->category = $category;
        return $this;
    }


}