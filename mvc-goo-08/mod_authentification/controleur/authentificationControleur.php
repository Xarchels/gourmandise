<?php

class AuthentificationControleur
{
    private $parametre = [];
    private $oModele;
    private $oVue;

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        $this->oModele = new AuthentificationModele($this->parametre);
        $this->oVue = new AuthentificationVue($this->parametre);
    }

    public function form_authentification()
    {
        $preparationAuthentifier = new AuthentificationTable();

        $this->oVue->genererAffichage(($preparationAuthentifier));
    }

    public function authentifier()
    {
        $controleAuthentification = new AuthentificationTable($this->parametre);
        
        if ($controleAuthentification->getAutorisationSession() == false ||
            $this->oModele->rechercherVendeur($controleAuthentification) == false)
        {
            $this->oVue->genererAffichage($controleAuthentification);
        } else {
            header('Location:index.php');
        }
    }

    public function deconnecter()
    {
        session_destroy();
        $_SESSION = [];
        header('Location:index.php');
    }
}