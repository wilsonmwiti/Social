<?php

namespace Model;


class Message {
    
    public $id;
    public $author;
    public $message;

    function __construct($id, $author, $message)
    {
        $this->id = $id;
        $this->author = $author;
        $this->message = $message;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function isNew(){
        return (null === $this->id);
    }
}