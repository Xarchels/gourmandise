<?php

class CommandeVue
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
        $this->tpl->assign('login', $_SESSION['prenomNom']);
        $this->tpl->assign('titreVue', 'GOURMANDISE SARL');
    }

    public function genererAffichageListe($valeurs)
    {
        $this->chargementValeurs();
        $this->tpl->assign('titrePage', 'Liste des commandes');
        $this->tpl->assign('listeCommandes', $valeurs);
        $this->tpl->display('mod_commande/vue/commandeListVue.tpl');
    }

    public function genererAffichageFiche($valeurs)
    {
        $this->chargementValeurs();

        switch ($this->parametre['action']) {
            case 'form_consulter':
                $this->tpl->assign('action', 'consulter');
                $this->tpl->assign('titrePage', 'Fiche Commande : Consultation');
                $this->tpl->assign('readonly', 'disabled');
                $this->tpl->assign('uneCommande', $valeurs);
                break;
            case 'form_ajouter' :
            case 'ajouter':
                $this->tpl->assign('action', 'ajouter');
                $this->tpl->assign('titrePage', 'Fiche Commande : Ajout');
                $this->tpl->assign('readonly', '');
                $this->tpl->assign('uneCommande', $valeurs);
                break;
            case 'form_modifier':
            case 'modifier':
                $this->tpl->assign('action', 'modifier');
                $this->tpl->assign('titrePage', 'Fiche Commande : Modification');
                $this->tpl->assign('readonly', '');
                $this->tpl->assign('uneCommande', $valeurs);
                break;
        }

        $this->tpl->display('mod_commande/vue/commandeFicheVue.tpl');
    }

    public function getAutorisationBD()
    {
        return false;
    }
}