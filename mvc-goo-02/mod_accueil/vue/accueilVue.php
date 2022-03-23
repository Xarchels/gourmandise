<?php

class AccueilVue
{
    private $parametres = [];
    private $tpl; //Objet

    public function __construct($parametres)
    {
        $this->parametres = $parametres;
        $this->tpl = new Smarty();
        $this->tpl->assign('titrePrincipal','GOURMANDISE SARL');
        $this->tpl->assign('accueil','NEW ACCUEIL');
        $this->tpl->display('mod_accueil/vue/AccueilVue.tpl');
    }
}