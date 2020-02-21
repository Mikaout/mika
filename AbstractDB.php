<?php

namespace framework;

require_once('ExtendDB.php');

abstract class AbstractDB {
    
    protected $hostname;
    protected $databaseName;
    protected $username;
    protected $password;
    protected $query;
    protected $mapper;
    protected $link;
    protected static $instance;

    public static function getInstance(array $configuration) {

        if (is_null(self::$instance)) {
            $classExtendDB = '\\framework\\ExtendDB';
            self::$instance = new $classExtendDB;
            self::$instance->setHostname($configuration['hostname']);
            self::$instance->setDatabaseName($configuration['databaseName']);
            self::$instance->setUsername($configuration['username']);
            self::$instance->setPassword($configuration['password']);
            self::$instance->connexion();
        }
        
    }

    public function getRead(string $sql, array $mapper) {
        self::$instance->setQuery($sql);
        self::$instance->setMapper($mapper);
	    return self::$instance->read();
    }

    public function setCreate(string $sql, array $mapper) {
        self::$instance->setQuery($sql);
        self::$instance->setMapper($mapper);
	    return self::$instance->create();
    }

    public function setHostname(string $hostname) {
        $this->hostname = $hostname;
    }

    public function setDatabaseName(string $databaseName) {
        $this->databaseName = $databaseName;
    }

    public function setUsername(string $username) {
        $this->username = $username;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }

    public function setQuery(string $query) {
        $this->query = $query;
    }

    public function setMapper(array $mapper) {
        $this->mapper = $mapper;
    }

}

?>