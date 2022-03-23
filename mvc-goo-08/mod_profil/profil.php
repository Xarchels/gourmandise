<?php
//Role de routeur

class Profil
{
    private $parametre = [];
    private $oControleur;

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        $this->oControleur = new ProfilControleur($this->parametre);
    }

    public function choixAction()
    {
        //Une structure de type switch() case
        if (isset($this->parametre['action'])) {
            if ($this->parametre['action'] = 'modifier') {
                $this->oControleur->modifier();
            }
        } else {
            $this->oControleur->form_modifier();
        }
    }
}
