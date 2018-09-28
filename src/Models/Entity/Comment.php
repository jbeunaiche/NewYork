<?php

namespace Julien\Models\Entity;

/**
 * Class Comment
 * @package Julien\Models\Entity
 */
class Comment

{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $news;
    /**
     * @var
     */
    private $author;
    /**
     * @var
     */
    private $comment;
    /**
     * @var
     */
    private $createdCom;
    /**
     * @var
     */
    private $status;

    /**
     * Comment constructor.
     * @param array $value
     */
    public

    function __construct($value = [])
    {
        if (!empty($value)) {
            $this->hydrate($value);
        }
    }

    /**
     * @param array $data
     */
    public

    function hydrate(array $data)
    {
        foreach ($data as $key => $value) {

            // On récupère le nom du setter correspondant à l'attribut.

            $method = 'set' . ucfirst($key);

            // Si le setter correspondant existe.

            if (method_exists($this, $method)) {

                // On appelle le setter.

                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public

    function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public

    function setId($id)
    {
        if ($id > 0) {
            $this->id = $id;
        }
    }


    /**
     * @return mixed
     */
    public

    function getPost()
    {
        return $this->post;
    }

    /**
     * @param $id
     */
    public

    function setPost($post)
    {

        $this->post = $post;

    }

    /**
     * @return mixed
     */
    public

    function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param $author
     */
    public

    function setAuthor($author)
    {
        if (is_string($author)) {
            $this->author = $author;
        }
    }

    // Setters

    /**
     * @return mixed
     */
    public

    function getComment()
    {
        return $this->comment;

    }

    /**
     * @param $comment
     */
    public

    function setComment($comment)
    {
        if (is_string($comment)) {
            $this->comment = $comment;

        }
    }

    /**
     * @return mixed
     */
    public

    function getCreatedCom()
    {
        return $this->createdCom;
    }

    /**
     * @param $CreatedCom
     */
    public

    function setCreatedCom($CreatedCom)
    {
        $this->CreatedCom = $CreatedCom;
    }

    /**
     * @return mixed
     */
    public

    function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * @param mixed $news
     */
    public function setNews($news)
    {
        $this->news = $news;
    }

}