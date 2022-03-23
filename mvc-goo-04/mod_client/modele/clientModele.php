<?php

class ClientModele extends Modele
{

    private $parametre = [];

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function getListeClients()
    {
        $sql = "SELECT * FROM client";
        $idRequete = $this->executeRequete($sql);

        if ($idRequete->rowCount() > 0) {
            while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
                $listeClients[] = new ClientTable($row);
            }
            return $listeClients;
        } else {
            return null;
        }
    }

    public function getUnClient()
    {
        $sql = "SELECT * FROM client WHERE codec = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['codec']]);
        $unClient = new ClientTable($idRequete->fetch(PDO::FETCH_ASSOC));
        return $unClient;
    }
}