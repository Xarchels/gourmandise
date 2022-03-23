<?php

class ProfilModele extends Modele
{

    private $parametre = [];

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function getUnProfil()
    {
        $sql = "SELECT * FROM vendeur WHERE codev = ?";
        $idRequete = $this->executeRequete($sql, [$_SESSION['codev']]);
        $unProfil = new ProfilTable($idRequete->fetch(PDO::FETCH_ASSOC));
        $montant = $this->calculerMontant();
        $unProfil->setMontant($montant);
        return $unProfil;
    }

    public function editProfil(ProfilTable $profil)
    {
        $sql = "UPDATE vendeur SET adresse = ?, cp = ?, ville = ?, telephone = ? WHERE codev = ?";
        $idRequete = $this->executeRequete($sql, [
            $profil->getAdresse(),
            $profil->getCp(),
            $profil->getVille(),
            $profil->getTelephone(),
            $profil->getCodev()
        ]);

        if ($idRequete) {
            ProfilTable::setMessageSucces("Client correctement modifié ! <br>");
        }

        $montant = $this->calculerMontant();
        $profil->setMontant($montant);
    }

    public function editPassword(ProfilTable $profil)
    {
        $gauche = "ar30&y%";
        $droite = "tk!@";
        $password = $this->parametre['password'];
        $password = hash("ripemd128", "$gauche$password$droite");
        $sql = "UPDATE vendeur SET motdepasse = ? WHERE codev = ?";
        $idRequete = $this->executeRequete($sql, [
            $password,
            $profil->getCodev()
        ]);


        if ($idRequete) {
            ProfilTable::setMessageSucces("Mot de passe correctement modifié ! <br>");
        }
    }

    public function calculerMontant()
    {
        $sql = "SELECT SUM(total_ht) as total FROM commande WHERE codev = ? GROUP BY codev";
        $idRequete = $this->executeRequete($sql, [$_SESSION['codev']]);

        if ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
            $montant = $row['total'];
        } else {
            $montant = 0;
        }

        return $montant;
    }
}