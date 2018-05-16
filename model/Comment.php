<?php

class Comment
{
    private $_id;
    private $_post_id;
    private $_parent_comment_id;
    private $_author;
    private $_comment;
    private $_comment_date;
    private $_comment_date_fr;
    private $_reported;
    private $_reporting;

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
    public function post_id()
    {
        return $this->_post_id;
    }
    public function parent_comment_id()
    {
        return $this->_parent_comment_id;
    }
    public function author()
    {
        return $this->_author;
    }
    public function comment()
    {
        return $this->_comment;
    }
    public function comment_date()
    {
        return $this->_comment_date;
    }
    public function comment_date_fr()
    {
        return $this->_comment_date_fr;
    }

    public function reported()
    {
        return $this->_reported;
    }

    public function reporting()
    {
        return $this->_reporting;
    }

    // Setters

    public function setId($id)
    {
        $id = (int) $id;

        $this->_id = $id;
    }

    public function setPost_id($post_id)
    {
        $this->_post_id = $post_id;
    }

    public function setParent_comment_id($parent_comment_id)
    {
        $this->_parent_comment_id = $parent_comment_id;
    }

    public function setAuthor($author)
    {
        $this->_author = $author;
    }

    public function setComment($comment)
    {
        $this->_comment = $comment;
    }

    public function setComment_date($comment_date)
    {
        $this->_comment_date = $comment_date;
    }

    public function setComment_date_fr($comment_date_fr)
    {
        $this->_comment_date_fr = $comment_date_fr;
    }

    public function setReported($reported)
    {
        $reported = (int) $reported;
        $this->_reported = $reported;
    }

    public function setReporting($reporting)
    {
        $this->_reporting = $reporting;
    }
}
