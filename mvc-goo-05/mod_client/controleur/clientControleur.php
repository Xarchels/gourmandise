<?php

class ClientControleur
{
    private $parametre = [];
    private $oModele;
    private $oVue;

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        $this->oModele = new ClientModele($this->parametre);
        $this->oVue = new ClientVue($this->parametre);
    }

    public function lister()
    {
        $ListeClient = $this->oModele->getListeClients();
//        var_dump($ListeClient);
//        die();
        $this->oVue->genererAffichageListe($ListeClient);

    }

    public function form_consulter()
    {
        $unClient = $this->oModele->getUnClient();
        $this->oVue->genererAffichageFiche($unClient);
    }

    public function form_ajouter()
    {
        $prepareClient = new ClientTable();
        $this->oVue->genererAffichageFiche($prepareClient);
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

        $controleClient = new ClientTable($this->parametre);

        if ($controleClient->getAutorisationBD()){
            $this->oModele->addClient($controleClient);
            $this->lister();
        } else {
            $this->oVue->genererAffichageFiche($controleClient);
        }
    }
}