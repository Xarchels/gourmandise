<?php
//Role de routeur

class Client
{
    private $parametre = [];
    private $oControleur;

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        $this->oControleur = new ClientControleur($this->parametre);
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
                case 'ajouter':
                    $this->oControleur->ajouter();
                    break;
                case 'form_modifier':
                    $this->oControleur->form_modifier();
                    break;
                case 'modifier':
                    $this->oControleur->modifier();
                    break;
                case 'form_supprimer':
                    $this->oControleur->form_supprimer();
                    break;
                case 'supprimer':
                    $this->oControleur->supprimer();
                    break;
            }
        } else {
            $this->oControleur->lister();
        }
    }
}