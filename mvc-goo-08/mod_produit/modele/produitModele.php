<?php

class ProduitModele extends Modele
{

    private $parametre = [];

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function getListeProduits()
    {
        $sql = "SELECT * FROM produit";
        $idRequete = $this->executeRequete($sql);

        if ($idRequete->rowCount() > 0) {
            while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
                $listeProduits[] = new ProduitTable($row);
            }
            return $listeProduits;
        } else {
            return null;
        }
    }

    public function getUnProduit()
    {
        $sql = "SELECT * FROM produit WHERE reference = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['reference']]);
        $unProduit = new ProduitTable($idRequete->fetch(PDO::FETCH_ASSOC));
        $prixKilo = $this->calculPrixKiloProduit();
        $unProduit->setPrixKilo($prixKilo);
        $place = $this->PopulariteProduit();
        $unProduit->setPlace($place);
        return $unProduit;
    }

    public function addProduit(ProduitTable $produit)
    {
        $sql = "INSERT INTO produit(designation, quantite, descriptif, prix_unitaire_HT, stock, poids_piece) VALUES(?, ?, ?, ?, ?, ?)";
        $idRequete = $this->executeRequete($sql, [
            $produit->getDesignation(),
            $produit->getQuantite(),
            $produit->getDescriptif(),
            $produit->getPrix_unitaire_HT(),
            $produit->getStock(),
            $produit->getPoids_piece()
        ]);

        if ($idRequete) {
            ProduitTable::setMessageSucces("Produit correctement ajouté !");
        }
    }

    public function editProduit(ProduitTable $produit)
    {
        $sql = "UPDATE produit SET designation = ?, quantite = ?, descriptif = ?, prix_unitaire_HT = ?, stock = ?, poids_piece = ? WHERE reference = ?";
        $idRequete = $this->executeRequete($sql, [
            $produit->getDesignation(),
            $produit->getQuantite(),
            $produit->getDescriptif(),
            $produit->getPrix_unitaire_HT(),
            $produit->getStock(),
            $produit->getPoids_piece(),
            $produit->getReference()
        ]);

        if ($idRequete) {
            ProduitTable::setMessageSucces("Produit correctement modifié !");
        }
    }

    public function deleteProduit()
    {
        $sql = "DELETE FROM produit WHERE reference = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['reference']]);

        if ($idRequete) {
            ProduitTable::setMessageSucces("Produit correctement supprimé !");
        }
    }

    public function suppressionPossibleProduit()
    {
        $sql = "SELECT COUNT(*) as nbLigCmd FROM ligne_commande WHERE reference = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['reference']]);
        $row = $idRequete->fetch(PDO::FETCH_ASSOC);

        if ($row['nbLigCmd'] > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function calculPrixKiloProduit()
    {
        $sql = "SELECT (prix_unitaire_ht *1000)/(quantite *((descriptif='G') + poids_piece)) as prixKilo FROM produit WHERE reference = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['reference']]);
        $row = $idRequete->fetch(PDO::FETCH_ASSOC);
        return $row['prixKilo'];

    }

    public function PopulariteProduit()
    {
        $sql = "SELECT produit.reference, SUM(quantite_demandee) as total 
                FROM ligne_commande RIGHT JOIN produit ON ligne_commande.reference = produit.reference
                GROUP BY reference 
                ORDER BY SUM(quantite_demandee) DESC";
        $idRequete = $this->executeRequete($sql);
        $place = 1;
        while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
            if ($place > 1){
                if ($quantitePrecedente == $row['total']){
                    $place--;
                }
            }
            if ($row['reference'] == $this->parametre['reference']){
                return $place;
            }
            $place++;
            $quantitePrecedente = $row['total'];
        }
        return $place;
    }
}