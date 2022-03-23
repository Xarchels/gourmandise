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
        $tabCa = $this->calculCA();
        $unClient->setCA($tabCa['CA']);
        $unClient->setPourcCA($tabCa['pourcCA']);
        $listeProduits = $this->meilleursAchats();
        $unClient->setListeProduit($listeProduits);
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

    public function calculCA()
    {
        $sql = "SELECT SUM(total_ht) as totalClient FROM commande WHERE codec = ? GROUP BY codec";
        $idRequete = $this->executeRequete($sql, [$this->parametre['codec']]);

        $sql2 = "SELECT SUM(total_ht) as total FROM commande";
        $idRequete2 = $this->executeRequete($sql2);
        $row2 = $idRequete2->fetch(PDO::FETCH_ASSOC);

        if ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
            $CA = $row['totalClient'];

        } else {
            $CA = 0;
        }
        $pourcCA = $CA * 100 / $row2['total'];

        $tab = array(
            'CA' => $CA,
            'pourcCA' => $pourcCA
        );

        return $tab;
    }

    public function meilleursAchats()
    {
        $sql = "SELECT designation, SUM(quantite_demandee) as nbAchat
                FROM ((produit INNER JOIN ligne_commande ON produit.reference = ligne_commande.reference)
                               INNER JOIN commande ON commande.numero = ligne_commande.numero)
                WHERE codec = ?
                GROUP BY produit.reference
                ORDER BY SUM(quantite_demandee) DESC";
        $idRequete = $this->executeRequete($sql, [$this->parametre['codec']]);
        $i = 0;
        $tab = [];
        while ($i < 5 && $row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
            $tab[$i] = array(
                'designation' => $row['designation'],
                'nbAchat' => $row['nbAchat']
            );
            $i++;
        }
        return $tab;
    }
}