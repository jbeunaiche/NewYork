<?php

namespace Julien\Models\Entity;

class Member

{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $pseudo;
    /**
     * @var
     */
    private $mail;
    /**
     * @var
     */
    private $password;


    /**
     * User constructor.
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
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }
    // Getters

    /**
     * @return mixed
     */
    public function id()

    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function pseudo()

    {
        return $this->pseudo;
    }

    /**
     * @return mixed
     */
    public function mail()

    {
        return $this->mail;
    }

    /**
     * @return mixed
     */
    public function password()

    {
        return $this->password;
    }
    // Setters

    /**
     * @param $id
     */
    public function setId($id)

    {
        if ($id > 0) {
            $this->id = $id;
        }
    }

    /**
     * @param $pseudo
     */
    public function setPseudo($pseudo)

    {
        if (is_string($pseudo)) {
            $this->pseudo = $pseudo;
        }
    }

    /**
     * @param $mail
     */
    public function setMail($mail)

    {
        if (is_string($mail)) {
            $this->mail = $mail;
        }
    }

    /**
     * @param $password
     */
    public function setPassword($password)

    {
        $this->password = $password;
    }
}