<?php

namespace Julien\Models\Entity;

/**
 * Class News
 * @package Julien\Models\Entity
 */
class News

{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $title;
    /**
     * @var
     */
    private $content;
    /**
     * @var
     */
    private $comments;
    /**
     * @var
     */
    private $created;

    /**
     * News constructor.
     * @param array $value
     */
    public function __construct($value = [])
    {
        if (!empty($value)) {
            $this->hydrate($value);
        }
    }

    /**
     * @param array $data
     */
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */

    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return mixed
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
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }


}