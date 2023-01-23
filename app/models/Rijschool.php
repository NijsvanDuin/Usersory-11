<?php

class Rijschool
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getInstrecteur()
    {
        try {
            $sql = "CALL readInstrecteurInDienst();";
            $this->db->query("$sql");
            $result = $this->db->resultSet();
            return $result ?? [];
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
    }
}
