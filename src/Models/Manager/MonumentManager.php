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
    $data = $req->fetchAll(\PDO::FETCH_ASSOC);
    $liste = json_encode($data);
    echo $liste;
    var_dump $liste;
    }
    
}
