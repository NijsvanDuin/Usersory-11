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
    public function getInstrecteurById($id)
    {
        try {
            $this->db->query("SELECT * FROM Instructeur WHERE Id = :id;");
            $this->db->bind(':id', $id);
            return $this->db->single();
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
    }
    public function getAutoById($id)
    {
        try {
            $this->db->query("SELECT * 
            FROM VoertuigInstructeur
            INNER JOIN Voertuig
            ON VoertuigInstructeur.VoertuigId = Voertuig.Id
            INNER JOIN Instructeur
            ON VoertuigInstructeur.InstructeurId = Instructeur.Id 
            INNER JOIN TypeVoertuig
            ON Voertuig.TypeVoertuigId = TypeVoertuig.Id
            WHERE VoertuigInstructeur.InstructeurId = :id;
            ");
            $this->db->bind(':id', $id);
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
    }
}
