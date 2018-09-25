<?php

namespace Julien\Models\Entity;

class Monument

{

    private $id;
    private $name;
    private $lat;
    private $lon;
    private $price;

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */


    public function setId($id)

    {
        if ($id > 0) {
            $this->id = $id;
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)

    {
        if (is_string($name)) {
            $this->name = $name;
        }
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    public function setLat($lat)
    {

        $this->lat = $lat;

    }

    /**
     * @return mixed
     */
    public function getLon()
    {
        return $this->lon;
    }

    public function setLon($lon)

    {
        $this->lon = $lon;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }


}