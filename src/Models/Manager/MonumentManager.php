<?php

namespace Julien\Models\Manager;
 
use Julien\Models\Manager;
use Julien\Models\Entity\Monument;

class MonumentManager extends Manager

{
    public function getMonument()
    {
        
    $req = $this->_db->prepare('SELECT id, name, longitude, latitude FROM monument');
    $reponse = $req->execute() or die('Erreur');
    while($ligne = $reponse->fetch(PDO::FETCH_ASSOC))
    {
        $data []= $ligne;
    }
    $encode_donnees = json_encode($data);
        
    }
}
