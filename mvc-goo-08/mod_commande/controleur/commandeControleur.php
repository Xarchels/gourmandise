<?php

class CommandeControleur
{
    private $parametre = [];
    private $oModele;
    private $oVue;

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        $this->oModele = new CommandeModele($this->parametre);
        $this->oVue = new CommandeVue($this->parametre);
    }

    public function lister()
    {
        $ListeCommande = $this->oModele->getListeCommande();
        $this->oVue->genererAffichageListe($ListeCommande);

    }

    public function listerNonValide()
    {
        $ListeCommande = $this->oModele->getListeCommandeNonValide();
        $this->oVue->genererAffichageListe($ListeCommande);

    }

    public function listerAnnulee()
    {
        $ListeCommande = $this->oModele->getListeCommandeAnnulee();
        $this->oVue->genererAffichageListe($ListeCommande);

    }

    public function form_consulter()
    {
        $uneCommande = $this->oModele->getUneCommande();
        $this->oVue->genererAffichageFiche($uneCommande);
    }

//    public function form_ajouter()
//    {
//        $prepareClient = new ClientTable();
//        $this->oVue->genererAffichageFiche($prepareClient);
//    }

    public function form_modifier()
    {
        $uneCommande = $this->oModele->getUneCommande();
        $this->oVue->genererAffichageFiche($uneCommande);
    }
//
//    public function ajouter()
//    {
//        /*
//         * Algo
//         * Controller les données récupérés du formulaire
//         *
//         * Si les données sont validées, alors enregistrement en base de données
//         * et retour à la liste avec message de succès
//         * Sinon, on redirige vers le formulaire en création avec les valeurs précédemment saisies
//         */
//
//        $controleClient = new ClientTable($this->parametre);
//
//        if ($controleClient->getAutorisationBD()) {
//            $this->oModele->addClient($controleClient);
//            $this->lister();
//        } else {
//            $this->oVue->genererAffichageFiche($controleClient);
//        }
//    }

    public function modifierDateLivraison()
    {
        //Contrôler les données
        $controleCommande = new CommandeTable($this->parametre);

        if ($controleCommande->getAutorisationBD()) {
            $this->oModele->editCommandeDateLivraison($controleCommande);
        }
    }
//
//    public function supprimer()
//    {
//        $controleSuppression = $this->oModele->suppressionPossibleClient();
//
//        if ($controleSuppression) {
//            $this->oModele->deleteClient();
//            $this->lister();
//        } else {
//            ClientTable::setMessageErreur("Suppression impossible, commande existante");
//            $this->oVue->genererAffichageFiche($this->oModele->getUnClient());
//
//        }
//    }
}