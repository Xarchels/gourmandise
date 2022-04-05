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

    public function getListeLigneCommande()
    {
        $sql = "SELECT numero, numero_ligne, ligne_commande.reference, designation, quantite_demandee, prix, prix_unitaire_HT as prix_ht
                FROM ligne_commande INNER JOIN produit ON ligne_commande.reference = produit.reference
                WHERE numero = ?";
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


    public function addCommande(CommandeTable $commande)
    {
        $sql = "INSERT INTO commande(codev, codec, date_livraison, date_commande, total_ht, total_tva, etat, statut)
                VALUES(?, ?, ?, ?, ?, ?, 0, 'NV')";
        $idRequete = $this->executeRequete($sql, [
            $commande->getCodev(),
            $commande->getCodec(),
            $commande->getDate_livraison(),
            $commande->getDate_commande(),
            $commande->getTotal_ht(),
            $commande->getTotal_tva(),
        ]);

        if ($idRequete) {
            CommandeTable::setMessageSucces("Commande correctement ajouté !");
        }
    }

    public function editCommandeDateLivraison(CommandeTable $commande)
    {
        $sql = "UPDATE commande SET date_livraison = ? WHERE numero = ?";
        $idRequete = $this->executeRequete($sql, [
            $commande->getDate_livraison()->format('Y-m-d'),
            $commande->getNumero()
        ]);

        if ($idRequete) {
            CommandeTable::setMessageSucces("La date de livraison a été correctement modifié !");
        }
    }

    public function editLigneCommande(ligneCommandeTable $ligne)
    {
        $sql = "UPDATE ligne_commande SET quantite_demandee = ? WHERE numero = ? AND numero_ligne = ?";
        $idRequete = $this->executeRequete($sql, [
            $ligne->getQuantite_demandee(),
            $ligne->getNumero(),
            $ligne->getNumero_ligne()
        ]);

        if ($idRequete) {
            CommandeTable::setMessageSucces("La commande a été correctement modifié !");
        }
    }

    public function editCommandePrix(CommandeTable $commande)
    {
        $sql = "SELECT SUM(((prix=0)*prix_unitaire_HT + prix)*quantite_demandee) as total_ht
                FROM ligne_commande INNER JOIN produit ON ligne_commande.reference = produit.reference
                WHERE numero = ?
                GROUP BY numero";
        $idRequete = $this->executeRequete($sql, [$this->parametre['numero']]);
        $row = $idRequete->fetch(PDO::FETCH_ASSOC);
        $total_ht = number_format($row['total_ht'] * 1.357, 2);
        $total_tva = number_format($total_ht * $commande::TVA, 2);

        $sql = "UPDATE commande SET total_ht = ?, total_tva = ? WHERE numero = ?";
        $idRequete = $this->executeRequete($sql, [
            $total_ht,
            $total_tva,
            $this->parametre['numero']
        ]);
    }

    public function editStatutCommande(string $statut)
    {
        $sql = "UPDATE commande SET statut = ? WHERE numero = ?";
        $idRequete = $this->executeRequete($sql, [
            $statut,
            $this->parametre['numero']
        ]);

        if ($idRequete){
            if ($statut == 'V') {
                CommandeTable::setMessageSucces("La commande a été correctement validée !");
            } elseif ($statut == 'A'){
                CommandeTable::setMessageSucces("La commande a été correctement annulée !");
            }
        }
    }

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