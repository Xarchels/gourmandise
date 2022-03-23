<?php

class ProduitControleur
{
    private $parametre = [];
    private $oModele;
    private $oVue;

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        $this->oModele = new ProduitModele($this->parametre);
        $this->oVue = new ProduitVue($this->parametre);
    }

    public function lister()
    {
        $ListeProduit = $this->oModele->getListeProduits();
        $this->oVue->genererAffichageListe($ListeProduit);

    }

    public function form_consulter()
    {
        $unProduit = $this->oModele->getUnProduit();
        $this->oVue->genererAffichageFiche($unProduit);
    }

    public function form_ajouter()
    {
        $prepareProduit = new ProduitTable();
        $this->oVue->genererAffichageFiche($prepareProduit);
    }

    public function form_modifier()
    {
        $unProduit = $this->oModele->getUnProduit();
        $this->oVue->genererAffichageFiche($unProduit);
    }

    public function form_supprimer()
    {
        $unProduit = $this->oModele->getUnProduit();
        $this->oVue->genererAffichageFiche($unProduit);
    }

    public function ajouter()
    {
        /*
         * Algo
         * Controller les données récupérés du formulaire
         *
         * Si les données sont validées, alors enregistrement en base de données
         * et retour à la liste avec message de succès
         * Sinon, on redirige vers le formulaire en création avec les valeurs précédemment saisies
         */

        $controleProduit = new ProduitTable($this->parametre);

        if ($controleProduit->getAutorisationBD()) {
            $this->oModele->addProduit($controleProduit);
            $this->lister();
        } else {
            $this->oVue->genererAffichageFiche($controleProduit);
        }
    }

    public function modifier()
    {
        //Contrôler les données
        $controleProduit = new ProduitTable($this->parametre);

        if ($controleProduit->getAutorisationBD()) {
            $this->oModele->editProduit($controleProduit);
            $this->lister();
        } else {
            $this->oVue->genererAffichageFiche($controleProduit);
        }
    }

    public function supprimer()
    {
        $controleSuppression = $this->oModele->suppressionPossibleProduit();

        if ($controleSuppression) {
            $this->oModele->deleteProduit();
            $this->lister();
        } else {
            ProduitTable::setMessageErreur("Suppression impossible, commande existante");
            $this->oVue->genererAffichageFiche($this->oModele->getUnProduit());

        }
    }
}