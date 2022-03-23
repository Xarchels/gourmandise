<?php

class Autoloader
{
    public static function chargerClasses()
    {
        //A chaque fois qu'une nouvelle classe est appelé, appelle la fonction autoload
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($maClasse)
    {
        //Supprime la maj de la première lettre du nom de la classe récupéré.
        //et stocké dans $maClasse en en minuscule pour correspondre avec le nom de fichier
        $maClasse = lcfirst($maClasse);

        $repertoires = array(
            'mod_accueil/',
            'mod_accueil/controleur/',
            'mod_accueil/modele/',
            'mod_accueil/vue/',
            'mod_client/',
            'mod_client/controleur/',
            'mod_client/modele/',
            'mod_client/vue/',
            'mod_authentification/',
            'mod_authentification/controleur/',
            'mod_authentification/modele/',
            'mod_authentification/vue/',
            'mod_produit/',
            'mod_produit/controleur/',
            'mod_produit/modele/',
            'mod_produit/vue/',
            'mod_profil/',
            'mod_profil/controleur/',
            'mod_profil/modele/',
            'mod_profil/vue/',
            'mod_commande/',
            'mod_commande/controleur/',
            'mod_commande/modele/',
            'mod_commande/vue/'
        );

        foreach ($repertoires as $repertoire) {
            // vérifier si un fichier $maClasse.php existe.
            //Si oui, on require_once
            if (file_exists($repertoire . $maClasse . '.php')) {
                require_once($repertoire . $maClasse . '.php');
                return;
            }
        }
    }
}