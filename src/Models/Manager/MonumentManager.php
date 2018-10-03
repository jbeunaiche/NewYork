<?php

namespace Julien\Models\Manager;

use Julien\Models\Manager;
use Julien\Models\Entity\Monument;

/**
 * Class MonumentManager
 * @package Julien\Models\Manager
 */
class MonumentManager extends Manager

{
    /**
     * @return mixed
     */
    public function getMonument()
    {

        $req = $this->_db->prepare('SELECT * FROM monument');
        $req->execute();
        $liste = $req->fetchAll();
        return $liste;

    }

    /**
     * @return mixed
     */
    public function getList()
    {

        $req = $this->_db->prepare('SELECT id, name, description, price FROM monument ');

        $req->execute();
        $req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Monument::class);
        $post = $req->fetchAll();
        return $post;
    }

    /**
     * @param Monument $monument
     */
    public

    function addMonument(Monument $monument)
    {

        $req = $this->_db->prepare('INSERT INTO monument(name, description, lat, lon, price) VALUES(:name, :description, :lat, :lon, :price)');
        $req->bindValue(':name', $monument->getName(), \PDO::PARAM_STR);
        $req->bindValue(':description', $monument->getDescription(), \PDO::PARAM_STR);
        $req->bindValue(':lat', $monument->getLat(), \PDO::PARAM_STR);
        $req->bindValue(':lon', $monument->getLon(), \PDO::PARAM_STR);
        $req->bindValue(':price', $monument->getPrice(), \PDO::PARAM_STR);


        $req->execute();
    }

}
