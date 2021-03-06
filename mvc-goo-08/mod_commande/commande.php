<?php
//Role de routeur

class Commande
{
    private $parametre = [];
    private $oControleur;

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        $this->oControleur = new CommandeControleur($this->parametre);
    }

    public function choixAction()
    {
        //Une structure de type switch() case
        if (isset($this->parametre['action'])) {
            switch ($this->parametre['action']) {
                case 'form_consulter':
                    $this->oControleur->form_consulter();
                    break;
                case 'form_ajouter':
                    $this->oControleur->form_ajouter();
                    break;
                case 'form_modifier':
                    $this->oControleur->form_modifier();
                    break;
                case 'listeNonValide':
                    $this->oControleur->listerNonValide();
                    break;
                case 'listeAnnulee':
                    $this->oControleur->listerAnnulee();
                    break;
                case 'maj_date':
                    $this->oControleur->modifierDateLivraison();
                    break;
                case 'modifierLigne':
                    $this->oControleur->modifierLigne_commande();
                    break;
                case 'finaliser':
                    $this->oControleur->finaliser();
                    break;
                case 'annuler':
                    $this->oControleur->annuler();
                    break;
                case 'form_vider':
                    $this->oControleur->vider();
                    break;
                case 'ajouter_ligne':
                    $this->oControleur->ajouterLigne();
                    break;
                case 'panier':
                    $this->oControleur->form_panier();
                    break;
                case 'supprimer_ligne':
                    $this->oControleur->supprimerLigne();
                    break;
                case 'modifier_ligne':
                    $this->oControleur->modifierLigne();
                    break;
            }
        } else {
            $this->oControleur->lister();
        }
    }
}