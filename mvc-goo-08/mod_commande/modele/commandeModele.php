<?php

class CommandeModele extends Modele
{

    private $parametre = [];

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function getListeCommande()
    {
        $sql = "SELECT numero, commande.codev, commande.codec, date_livraison, date_commande, total_ht, total_tva, etat, statut,
                       client.nom as client, vendeur.prenom as vendeurPrenom, vendeur.nom as vendeurNom
                FROM (commande INNER JOIN vendeur ON commande.codev = vendeur.codev)
                               INNER JOIN client ON commande.codec = client.codec";
        $idRequete = $this->executeRequete($sql);

        if ($idRequete->rowCount() > 0) {
            while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
                $listeCommandes[] = new CommandeTable($row);
            }
            return $listeCommandes;
        } else {
            return null;
        }
    }

    public function getListeCommandeAnnulee()
    {
        $sql = "SELECT numero, commande.codev, commande.codec, date_livraison, date_commande, total_ht, total_tva, etat, statut,
                       client.nom as client, vendeur.prenom as vendeurPrenom, vendeur.nom as vendeurNom
                FROM (commande INNER JOIN vendeur ON commande.codev = vendeur.codev)
                               INNER JOIN client ON commande.codec = client.codec
                WHERE statut = 'A'";
        $idRequete = $this->executeRequete($sql);

        if ($idRequete->rowCount() > 0) {
            while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
                $listeCommandes[] = new CommandeTable($row);
            }
            return $listeCommandes;
        } else {
            return null;
        }
    }

    public function getListeCommandeNonValide()
    {
        $sql = "SELECT numero, commande.codev, commande.codec, date_livraison, date_commande, total_ht, total_tva, etat, statut,
                       client.nom as client, vendeur.prenom as vendeurPrenom, vendeur.nom as vendeurNom
                FROM (commande INNER JOIN vendeur ON commande.codev = vendeur.codev)
                               INNER JOIN client ON commande.codec = client.codec
                WHERE statut = 'NV'";
        $idRequete = $this->executeRequete($sql);

        if ($idRequete->rowCount() > 0) {
            while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
                $listeCommandes[] = new CommandeTable($row);
            }
            return $listeCommandes;
        } else {
            return null;
        }
    }

    public function getUneCommande()
    {
        $sql = "SELECT numero, commande.codev, commande.codec, date_livraison, date_commande, total_ht, total_tva, etat, statut,
                       client.nom as client, vendeur.prenom as vendeurPrenom, vendeur.nom as vendeurNom
                FROM (commande INNER JOIN vendeur ON commande.codev = vendeur.codev)
                               INNER JOIN client ON commande.codec = client.codec
                WHERE numero = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['numero']]);
        $uneCommande = new CommandeTable($idRequete->fetch(PDO::FETCH_ASSOC));
        return $uneCommande;
    }
//
//    public function addClient(ClientTable $client)
//    {
//        $sql = "INSERT INTO client(nom, adresse, cp, ville, telephone) VALUES(?, ?, ?, ?, ?)";
//        $idRequete = $this->executeRequete($sql, [
//            $client->getNom(),
//            $client->getAdresse(),
//            $client->getCp(),
//            $client->getVille(),
//            $client->getTelephone()
//        ]);
//
//        if ($idRequete) {
//            ClientTable::setMessageSucces("Client correctement ajouté !");
//        }
//    }
//
//    public function editClient(ClientTable $client)
//    {
//        $sql = "UPDATE client SET nom = ?, adresse = ?, cp = ?, ville = ?, telephone = ? WHERE codec = ?";
//        $idRequete = $this->executeRequete($sql, [
//            $client->getNom(),
//            $client->getAdresse(),
//            $client->getCp(),
//            $client->getVille(),
//            $client->getTelephone(),
//            $client->getCodec()
//        ]);
//
//        if ($idRequete) {
//            ClientTable::setMessageSucces("Client correctement modifié !");
//        }
//    }
//
//    public function deleteClient()
//    {
//        $sql = "DELETE FROM client WHERE codec = ?";
//        $idRequete = $this->executeRequete($sql, [$this->parametre['codec']]);
//
//        if ($idRequete) {
//            ClientTable::setMessageSucces("Client correctement supprimé !");
//        }
//    }
//
//    public function suppressionPossibleClient()
//    {
//        $sql = "SELECT COUNT(*) as nbCmd FROM commande WHERE codec = ?";
//        $idRequete = $this->executeRequete($sql, [$this->parametre['codec']]);
//        $row = $idRequete->fetch(PDO::FETCH_ASSOC);
//
//        if ($row['nbCmd'] > 0) {
//            return false;
//        } else {
//            return true;
//        }
//    }
}