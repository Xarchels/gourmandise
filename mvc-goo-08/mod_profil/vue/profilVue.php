<?php

class ProfilVue
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

    public function genererAffichageFiche($valeurs)
    {
        $this->chargementValeurs();

        $this->tpl->assign('action', 'modifier');
        $this->tpl->assign('titrePage', 'Mon profil');
        $this->tpl->assign('unProfil', $valeurs);

        $this->tpl->display('mod_profil/vue/profilFicheVue.tpl');
    }

//    public function getAutorisationBD()
//    {
//        return false;
//    }
}