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
            WHERE VoertuigInstructeur.InstructeurId = :id 
            ORDER BY TypeVoertuig.Rijbewijscategorie ASC;
            ");
            $this->db->bind(':id', $id);
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
    }
    public function getVoertuigById($id)
    {
        try {
            $this->db->query("Select Voertuig.Id, Voertuig.Kenteken, Voertuig.Bouwjaar, Voertuig.Brandstof, TypeVoertuig.TypeVoertuig, Voertuig.Type, TypeVoertuig.Rijbewijscategorie

            From Voertuig
            Inner join TypeVoertuig
            on Voertuig.TypeVoertuigId = TypeVoertuig.Id
            Where Voertuig.Id not in (select VoertuigInstructeur.VoertuigId from VoertuigInstructeur where VoertuigInstructeur.InstructeurId = :id)
            ");
            $this->db->bind(':id', $id);
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
    }
    public function addVoertuig($insId, $voeId)
    {
        $this->db->query("Insert into VoertuigInstructeur (Id,InstructeurId, VoertuigId,DatumToegevoegt) values (NULL,:instructeurId, :voertuigId,'2023-01-30')");
        $this->db->bind(':instructeurId', $insId);
        $this->db->bind(':voertuigId', $voeId);
        return $this->db->execute();
    }
}
