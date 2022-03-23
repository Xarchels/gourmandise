<?php

class clientVue
{
    private $parametre = [];
    private $tpl;

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        $this->tpl = new Smarty();
    }

    public function chargementValeurs()
    {
        $this->tpl->assign('login','Ici nom du vendeur connecté');
        $this->tpl->assign('titreVue', 'GOURMANDISE SARL');
    }

    public function genererAffichageListe($valeurs)
    {
        $this->chargementValeurs();
        $this->tpl->assign('titrePage', 'Liste des clients');
        $this->tpl->assign('listeClients', $valeurs);
        $this->tpl->display('mod_client/vue/clientListeVue.tpl');
    }

    public function genererAffichageFiche($valeurs)
    {
        $this->chargementValeurs();
        $this->tpl->assign('titrePage', 'Fiche Client');
        $this->tpl->assign('unClient', $valeurs);
        $this->tpl->display('mod_client/vue/clientFicheVue.tpl');
    }
}