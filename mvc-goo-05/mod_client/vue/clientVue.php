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
        $this->tpl->assign('login', 'Ici nom du vendeur connecté');
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

        switch ($this->parametre['action']) {
            case 'form_consulter':
                $this->tpl->assign('action', 'consulter');
                $this->tpl->assign('titrePage', 'Fiche Client : Consultation');
                $this->tpl->assign('readonly', 'disabled');
                $this->tpl->assign('unClient', $valeurs);
                break;
            case 'form_ajouter' :
            case 'ajouter':
                $this->tpl->assign('action', 'ajouter');
                $this->tpl->assign('titrePage', 'Fiche Client : Ajout');
                $this->tpl->assign('readonly', '');
                $this->tpl->assign('unClient', $valeurs);
                break;
        }

        $this->tpl->display('mod_client/vue/clientFicheVue.tpl');
    }

    public function getAutorisationBD()
    {
        return false;
    }
}