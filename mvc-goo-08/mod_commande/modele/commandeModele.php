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
        $listeLigneCommande = $this->getListeLigneCommande();
        $uneCommande->setListeLigneCommande($listeLigneCommande);
        return $uneCommande;
    }

    public  function getListeLigneCommande()
    {
        $sql = "SELECT numero, numero_ligne, ligne_commande.reference, designation, quantite_demandee, prix_unitaire_HT as prix
                FROM ligne_commande INNER JOIN produit ON ligne_commande.reference = produit.reference
                WHERE numero = ?
                ORDER BY numero_ligne";
        $idRequete = $this->executeRequete($sql, [$this->parametre['numero']]);
        if ($idRequete->rowCount() > 0) {
            while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
                $listeLigneCommande[] = new LigneCommandeTable($row);
            }
            return $listeLigneCommande;
        } else {
            return null;
        }
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
    public function editCommandeDateLivraison(CommandeTable $commande)
    {
        $sql = "UPDATE commande SET date_livraison = ? WHERE numero = ?";
        $idRequete = $this->executeRequete($sql, [
            $commande->getDate_livraison()->format('Y-m-d'),
            $commande->getNumero()
        ]);

        if ($idRequete) {
            ClientTable::setMessageSucces("La date de livraison a été correctement modifié !");
        }
    }
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