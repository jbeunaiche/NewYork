<?php

namespace Julien\Models;

/**
 * Class Manager
 * @package Julien\Models
 */
class Manager

{
    /**
     * @var
     */
    protected $_db; // Instance de PDO

    /**
     * Manager constructor.
     */
    public function __construct()
    {
        $this->dbConnect();
    }

    /**
     *
     */
    protected function dbConnect()
    {
        $this->_db = new \PDO('mysql:host=jbeunaicmcny.mysql.db;dbname=jbeunaicmcny;charset=utf8', 'jbeunaicmcny', 'Keirak07');

        //  $this->_db = new \PDO('mysql:host=localhost;dbname=newyork;charset=utf8', 'root', '');
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * @param $db
     */
    public function setDb($db)
    {
        $this->_db = $db;
    }
}