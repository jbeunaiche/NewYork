<?php

namespace Julien\Models\Manager;
 
use Julien\Models\Manager;
use Julien\Models\Entity\Monument;

class MonumentManager extends Manager

{
    public function getMonument()
    {
        
    $req = $this->_db->prepare('SELECT * FROM monument');
    $req->execute();
    $liste = $req->fetchAll();
    return $liste;

    }
    
}
