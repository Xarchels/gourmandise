<?php
//Role de routeur

class Authentification
{
    private $parametre = [];
    private $oControleur;

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        $this->oControleur = new AuthentificationControleur($this->parametre);
    }

    public function choixAction()
    {
        //Une structure de type switch() case
        if (isset($this->parametre['action'])) {
            switch ($this->parametre['action']) {
                case 'authentifier':
                    $this->oControleur->authentifier();
                    break;
                case 'deconnecter':
                    $this->oControleur->deconnecter();
                    break;
            }
        } else {
            //Par défaut (pas de liste ici)
            //affichage du formulaire vierge
            $this->oControleur->form_authentification();
        }
    }
}