<?php

namespace Julien\Models\Manager;
 
use Julien\Models\Manager;
use Julien\Models\Entity\Monument;

class MonumentManager extends Manager

{
    public function getMonument(){
    $req = $this->_db->prepare('SELECT id, name, latitude, longitude FROM monument ');
	$req->execute();
	$req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, Monument::class);
	$liste = $req->fetchAll();
	return $liste;
	var_dump $liste;
    
}
}