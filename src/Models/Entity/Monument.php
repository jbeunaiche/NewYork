<?php

namespace Julien\Models\Entity;

class Monument

{
    
    private $id;
    
    private $name;
    
    private $price;
    
    private $latitude;
 
    private $longitude;

    public function __construct($value = [])

 {
  if (!empty($value))
  {
   $this->hydrate($value);
  }
 }

    /**
     * @param array $data
     */
    public function hydrate(array $data)

 {
  foreach($data as $key => $value)
  {
   // On récupère le nom du setter correspondant à l'attribut.
   $method = 'set' . ucfirst($key);
   // Si le setter correspondant existe.
   if (method_exists($this, $method))
   {
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

    public function longitude()

 {
  return $this->longitude;
 }

    public function latitude()

 {
  return $this->latitude;
 }
    
       public function price()

 {
  return $this->price;
 }

    public function setId($id)

 {
  if ($id > 0)
  {
   $this->id = $id;
  }
 }

    public function setName($name)

 {
  if (is_string($name))
  {
   $this->name = $name;
  }
 }

    public function setLatitude($latitude)
    {
 
   $this->latitude = $latitude;
  
 }

    public function setLongitude($longitude)

 {
  $this->longitude = $longitude;
 }
    
     public function setPrice($price)

 {
  $this->price = $price;
 }
}