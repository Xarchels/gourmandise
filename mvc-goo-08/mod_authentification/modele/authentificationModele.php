<?php

class AuthentificationModele extends Modele
{
    private $parametre = [];

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function rechercherVendeur(AuthentificationTable $authEnCours)
    {
        $sql = "SELECT * FROM vendeur WHERE login = ?";
        $idRequete = $this->executeRequete($sql, [$authEnCours->getLogin()]);
        $authExistant = $idRequete->fetch(PDO::FETCH_ASSOC);
        if ($idRequete->rowCount() == 1 &&
            $authEnCours->getPassword() == $authExistant['motdepasse'] &&
            $authEnCours->getLogin() == $authExistant['login'])
        {
            $_SESSION['login'] = $authEnCours->getLogin();
            $_SESSION['prenomNom'] = $authExistant['prenom'] . " " . $authExistant['nom'];
            $_SESSION['codev'] = $authExistant['codev'];
            return true;
        }
        AuthentificationTable::setMessageErreur('Authentification invalide');
        return false;
    }
}