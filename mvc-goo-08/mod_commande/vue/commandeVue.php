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

    public function genererAffichageFiche($valeurs, $valeursProduits = null)
    {
        $this->chargementValeurs();

        switch ($this->parametre['action']) {
            case 'form_consulter':
                $this->tpl->assign('action', 'consulter');
                $this->tpl->assign('titrePage', 'Fiche Commande : Consultation');
                $this->tpl->assign('readonly', 'disabled');
                $this->tpl->assign('uneCommande', $valeurs);
                $this->tpl->display('mod_commande/vue/commandeFicheVue.tpl');
                break;
            case 'form_ajouter' :
            case 'ajouter':
            case 'ajouter_ligne':
                $this->tpl->assign('action', 'ajouter');
                $this->tpl->assign('titrePage', 'Fiche Commande : Ajout');
                $this->tpl->assign('uneCommande', $valeurs);
                $this->tpl->assign('listeProduits', $valeursProduits);
                $this->tpl->assign('quantite', $_SESSION['panier']['quantite']);
                $this->tpl->display('mod_commande/vue/commandeFicheAjouterVue.tpl');
                break;
            case 'form_modifier':
            case 'modifier':
            case 'maj_date':
            case 'modifierLigne':
                $this->tpl->assign('action', 'modifier');
                $this->tpl->assign('titrePage', 'Fiche Commande : Modification');
                $this->tpl->assign('uneCommande', $valeurs);
                $this->tpl->display('mod_commande/vue/commandeFicheVue.tpl');
                break;
        }

    }

    public function genererAffichagePanier()
    {
        $this->chargementValeurs();

        $this->tpl->assign('action', 'consulter');
        $this->tpl->assign('titrePage', 'Panier');
        $this->tpl->assign('lignes', $_SESSION['panier']['ligne']);
        $this->tpl->assign('commande', $_SESSION['panier']['commande']);
        $this->tpl->display('mod_commande/vue/panierFicheVue.tpl');
    }
}