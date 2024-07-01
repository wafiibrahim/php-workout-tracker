<?php
class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'test';
    private $connection;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->dbname);
        if ($this->connection->connect_error) {
            die("Database connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function prepare($sql) {
        return $this->connection->prepare($sql);
    }

    public function close() {
        $this->connection->close();
    }
}
