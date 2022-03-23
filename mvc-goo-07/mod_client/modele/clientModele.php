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

    public function addClient(ClientTable $client)
    {
        $sql = "INSERT INTO client(nom, adresse, cp, ville, telephone) VALUES(?, ?, ?, ?, ?)";
        $idRequete = $this->executeRequete($sql, [
            $client->getNom(),
            $client->getAdresse(),
            $client->getCp(),
            $client->getVille(),
            $client->getTelephone()
        ]);

        if ($idRequete) {
            ClientTable::setMessageSucces("Client correctement ajouté !");
        }
    }

    public function editClient(ClientTable $client)
    {
        $sql = "UPDATE client SET nom = ?, adresse = ?, cp = ?, ville = ?, telephone = ? WHERE codec = ?";
        $idRequete = $this->executeRequete($sql, [
            $client->getNom(),
            $client->getAdresse(),
            $client->getCp(),
            $client->getVille(),
            $client->getTelephone(),
            $client->getCodec()
        ]);

        if ($idRequete) {
            ClientTable::setMessageSucces("Client correctement modifié !");
        }
    }

    public function deleteClient()
    {
        $sql = "DELETE FROM client WHERE codec = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['codec']]);

        if ($idRequete) {
            ClientTable::setMessageSucces("Client correctement supprimé !");
        }
    }

    public function suppressionPossibleClient()
    {
        $sql = "SELECT COUNT(*) as nbCmd FROM commande WHERE codec = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['codec']]);
        $row = $idRequete->fetch(PDO::FETCH_ASSOC);

        if ($row['nbCmd'] > 0) {
            return false;
        } else {
            return true;
        }
    }
}