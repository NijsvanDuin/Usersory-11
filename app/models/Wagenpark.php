<?php

class Wagenpark
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getKmstand()
    {
        $this->db->query("SELECT Auto.id, Auto.Type, Auto.Kenteken
                          FROM Kilometerstand 
                          INNER JOIN Auto 
                          ON Kilometerstand.AutoId = Auto.id;");;
        $result = $this->db->resultSet();
        return $result;
    }
    public function addKmstand($post)
    {
        $sql = "INSERT INTO Kilometerstand (AutoId, Datum, KmStand) VALUES (:AutoId, '2022-12-12 10:53:01.000000', :KmStand)";
        $this->db->query($sql);
        $this->db->bind(':AutoId', $post['AutoId'], PDO::PARAM_INT);
        $this->db->bind(':KmStand', $post['KmStand'], PDO::PARAM_STR);
        return $this->db->execute();
    }
}
