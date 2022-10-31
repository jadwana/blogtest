<?php

namespace App\Classes;

use App\Classes\Enum\CommentStatus;

class Comments

{
    public $content;

    public CommentStatus $status;

    public function __construct()
    {
        $this->status = CommentStatus::APPROBAL_PENDING;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}