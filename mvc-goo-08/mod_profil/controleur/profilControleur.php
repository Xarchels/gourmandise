<?php

class ProfilControleur
{
    private $parametre = [];
    private $oModele;
    private $oVue;

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        $this->oModele = new ProfilModele($this->parametre);
        $this->oVue = new ProfilVue($this->parametre);
    }

    public function form_modifier()
    {
        $unProfil = $this->oModele->getUnProfil();
        $this->oVue->genererAffichageFiche($unProfil);
    }

    public function modifier()
    {
        //Contrôler les données
        $controleProfil = new ProfilTable($this->parametre);

        if ($controleProfil->getAutorisationBD()) {
            $this->oModele->editProfil($controleProfil); //Modification profil hors mdp

            if ($this->parametre['password'] <> "") {

                if ($this->parametre['password'] = $this->parametre['confirmation']) {
                    $this->oModele->editPassword($controleProfil); //modification mdp
                } else {
                    $controleProfil::setMessageErreur("Le mot de passe n'a pas été modifié");
                }
            }
        }

        $this->oVue->genererAffichageFiche($controleProfil);
    }
}