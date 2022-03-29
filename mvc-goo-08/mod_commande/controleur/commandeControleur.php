<?php

class CommandeControleur
{
    private $parametre = [];
    private $oModele;
    private $oModele2;
    private $oVue;

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        $this->oModele = new CommandeModele($this->parametre);
        $this->oModele2 = new ProduitModele($this->parametre);
        $this->oVue = new CommandeVue($this->parametre);
    }

    public function lister()
    {
        $ListeCommande = $this->oModele->getListeCommande();
        $this->oVue->genererAffichageListe($ListeCommande);

    }

    public function listerNonValide()
    {
        $ListeCommande = $this->oModele->getListeCommandeNonValide();
        $this->oVue->genererAffichageListe($ListeCommande);

    }

    public function listerAnnulee()
    {
        $ListeCommande = $this->oModele->getListeCommandeAnnulee();
        $this->oVue->genererAffichageListe($ListeCommande);

    }

    public function form_consulter()
    {
        $uneCommande = $this->oModele->getUneCommande();
        $this->oVue->genererAffichageFiche($uneCommande);
    }

    public function form_ajouter()
    {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier']['commande'] = new CommandeTable($_SESSION);
            $_SESSION['panier']['quantite'] = 0;
        }

        $listeProduit = $this->oModele2->getListeProduits();
        $this->oVue->genererAffichageFiche($_SESSION['panier']['commande'], $listeProduit);
    }

    public function form_modifier()
    {
        $uneCommande = $this->oModele->getUneCommande();
        $this->oVue->genererAffichageFiche($uneCommande);
    }

    public function vider()
    {
        if (isset($_SESSION['panier'])) {
            unset($_SESSION['panier']);
        }
        $this->lister();
    }

    public function ajouterLigne()
    {
        $unProduit = $this->oModele2->getUnProduit();
        $existe = false;
        if ($this->parametre['quantite'] > 0) {
            if (isset($_SESSION['panier']['ligne'])) {
                foreach ($_SESSION['panier']['ligne'] as $ligne) {
                    if ($ligne->getReference() == $unProduit->getReference()) {
                        $prix = $_SESSION['panier']['commande']->getTotal_ht();
                        $prix = $prix - $ligne->getQuantite_demandee() * $ligne->getPrix();
                        $ligne->setQuantite_demandee($this->parametre['quantite'] + $ligne->getQuantite_demandee());
                        $ligne->setPrix($this->parametre['prixVente']);
                        $prix += $ligne->getQuantite_demandee() * $ligne->getPrix();
                        $_SESSION['panier']['commande']->setTotal_ht($prix);
                        $existe = true;
                    }

                }
            }

            if (!$existe) {
                $tab = array(
                    'reference' => $unProduit->getReference(),
                    'designation' => $unProduit->getDesignation(),
                    'quantite_demandee' => $this->parametre['quantite'],
                    'prix_ht' => $unProduit->getPrix_unitaire_HT(),
                    'prix' => $this->parametre['prixVente']
                );
                $_SESSION['panier']['ligne'][] = new LigneCommandeTable($tab);
                $prix = $_SESSION['panier']['commande']->getTotal_ht() + $this->parametre['quantite'] * $this->parametre['prixVente'];
                $_SESSION['panier']['commande']->setTotal_ht($prix);
                $_SESSION['panier']['commande']->setTotal_tva($prix*0.20);

            }

            $_SESSION['panier']['quantite'] += $this->parametre['quantite'];

        } else {
            CommandeTable::setMessageErreur('La quantité du produit doit être supérieure à 0');
        }

        $this->form_ajouter();

    }

    public function modifierDateLivraison()
    {
        //Contrôler les données
        $controleCommande = new CommandeTable($this->parametre);

        if ($controleCommande->getAutorisationBD()) {
            $this->oModele->editCommandeDateLivraison($controleCommande);
        }
        $this->form_modifier();
    }

    public function modifierLigne_commande()
    {
        //Contrôler les données
        $controleLigneCommande = new ligneCommandeTable($this->parametre);
        $controleCommande = new CommandeTable($this->parametre);

        if ($controleCommande->getAutorisationBD() && $controleLigneCommande->getAutorisationBD()) {
            $this->oModele->editLigneCommande($controleLigneCommande);
            $this->oModele->editCommandePrix($controleCommande);
        }
        $this->form_modifier();
    }

    public function finaliser()
    {
        $controleCommande = new CommandeTable($this->parametre);

        if ($controleCommande->getAutorisationBD()) {
            $this->oModele->editStatutCommande('V');
        }
        $this->lister();
    }

    public function annuler()
    {
        $controleCommande = new CommandeTable($this->parametre);

        if ($controleCommande->getAutorisationBD()) {
            $this->oModele->editStatutCommande('A');
        }
        $this->lister();
    }

    public function form_panier()
    {
        $this->oVue->genererAffichagePanier();
    }
//
//    public function supprimer()
//    {
//        $controleSuppression = $this->oModele->suppressionPossibleClient();
//
//        if ($controleSuppression) {
//            $this->oModele->deleteClient();
//            $this->lister();
//        } else {
//            ClientTable::setMessageErreur("Suppression impossible, commande existante");
//            $this->oVue->genererAffichageFiche($this->oModele->getUnClient());
//
//        }
//    }
}