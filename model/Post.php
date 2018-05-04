<?php

class Post
{
    private $_id;
    private $_title;
    private $_content;
    private $_creation_date;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    private function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Getters

    public function id()
    {
        return $this->_id;
    }
    public function title()
    {
        return $this->_title;
    }
    public function content()
    {
        return $this->_content;
    }
    public function creation_date()
    {
        return $this->_creation_date;
    }

    // Setters

    public function setId($id)
    {
        $id = (int) $id;
        $this->_id = $id;
    }

    public function setTitle($title)
    {
        $this->_title = $title;
    }

    public function setContent($content)
    {
        $this->_content = $content;
    }

    public function setCreation_date($creation_date)
    {
        $this->_creation_date = $creation_date;
    }
}
