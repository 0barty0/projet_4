<?php

class Comment
{
    private $_id;
    private $_post_id;
    private $_author;
    private $_comment;
    private $_comment_date;

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
}
