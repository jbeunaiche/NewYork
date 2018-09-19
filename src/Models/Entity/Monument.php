<?php

namespace Julien\Models\Entity;

class Monument

{

    private $id;
    private $name;
    private $lat;
    private $lon;

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
    public function name()

    {
        return $this->name;
    }

    public function lon()

    {
        return $this->long;
    }

    public function lat()

    {
        return $this->lat;
    }


    public function setId($id)

    {
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function setName($name)

    {
        if (is_string($name)) {
            $this->name = $name;
        }
    }

    public function setLat($lat)
    {

        $this->lat = $lat;

    }

    public function setLon($lon)

    {
        $this->lon = $lon;
    }


}