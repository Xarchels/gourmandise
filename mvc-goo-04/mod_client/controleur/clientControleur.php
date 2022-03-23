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

}