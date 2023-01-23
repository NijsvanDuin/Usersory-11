<?php

class Mankement
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getMankement()
    {
        $this->db->query("SELECT Mankement.Id, Mankement.AutoId, Mankement.Datum, Mankement.Mankement, Instructeur.Naam, Instructeur.Email, Auto.Kenteken, Auto.Type
                          FROM Mankement 
                          INNER JOIN Auto
                          ON Mankement.AutoId = Auto.Id
                          INNER JOIN Instructeur
                          ON Auto.InstructeurId = Instructeur.Id
                          WHERE Instructeur.Id = 2
                          ORDER BY Mankement.Datum DESC;");;
        $result = $this->db->resultSet();
        return $result;
    }
    public function addMankement($post)
    {
        $sql = "INSERT INTO Mankement (AutoId, Datum, Mankement) VALUES (2, '2023-01-09', :Mankement)";
        $this->db->query($sql);
        // $this->db->bind(':AutoId', $post['AutoId'], PDO::PARAM_INT);
        $this->db->bind(':Mankement', $post['mankement'], PDO::PARAM_STR);
        return $this->db->execute();
    }
}
