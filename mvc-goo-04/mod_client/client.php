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
            }
        } else {
            $this->oControleur->lister();
        }
    }
}