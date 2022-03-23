<?php

class AccueilVue
{
    private $parametres = [];
    private $tpl; //Objet

    public function __construct($parametres)
    {
        $this->parametres = $parametres;
        $this->tpl = new Smarty();

    }

    public function genererAffichage()
    {
        $this->tpl->assign('login','Nom du vendeur');
        $this->tpl->assign('tabBord','Ici le contenu');
        $this->tpl->display('mod_accueil/vue/AccueilVue.tpl');
    }
}