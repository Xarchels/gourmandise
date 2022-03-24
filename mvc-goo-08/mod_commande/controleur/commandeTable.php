<?php

class CommandeTable
{
    private $numero = "";
    private $codev = "";
    private $codec = "";
    private DateTime $date_livraison;
    private DateTime $date_commande;
    private $total_ht = "";
    private $total_tva = "";
    private $etat = "";
    private $statut = "";
    private $client = "";
    private $vendeurNom = "";
    private $vendeurPrenom = "";
    private $listeLigneCommande = [];

    private $autorisationBD = true;

    private static $messageErreur = "";
    private static $messageSucces = "";

    public function hydrater(array $row)
    {
        foreach ($row as $cle => $valeur) {
            $setter = 'set' . ucfirst($cle);
            if (method_exists($this, $setter)) {
                $this->$setter($valeur);
            }
        }
    }

    public function __construct($data = null)
    {
        if ($data <> null) {
            $this->hydrater($data);
        }

    }

    //3 Génerer les getter et les setter

    /**
     * @return string
     */
    public function getNumero(): string
    {
        return $this->numero;
    }

    /**
     * @param string $numero
     */
    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    /**
     * @return string
     */
    public function getCodev(): string
    {
        return $this->codev;
    }

    /**
     * @param string $codev
     */
    public function setCodev(string $codev): void
    {
        $this->codev = $codev;
    }

    /**
     * @return string
     */
    public function getCodec(): string
    {
        return $this->codec;
    }

    /**
     * @param string $codec
     */
    public function setCodec(string $codec): void
    {
        $this->codec = $codec;
    }

    public function getDate_livraison()
    {
        return $this->date_livraison;
    }

    /**
     * @param string $date_livraison
     */
    public function setDate_livraison(string $date_livraison): void
    {
//        if($date_livraison < $this->date_commande->format('Y-m-d')){
//            $this->setAutorisationBD(false);
//            self::setMessageErreur("La date de livraison doit être après la date de commande");
//        }
        $date = new DateTime($date_livraison);
//        $date_livraison = $date->format('Y-m-d');
        $this->date_livraison = $date;
    }

    public function getDate_commande()
    {
        return $this->date_commande;
    }

    /**
     * @param string $date_commande
     */
    public function setDate_commande(string $date_commande): void
    {
        $date = new DateTime($date_commande);
//        $date_commande = $date->format('Y-m-d');
        $this->date_commande = $date;
    }

    /**
     * @return string
     */
    public function getTotal_ht(): string
    {
        return $this->total_ht;
    }

    /**
     * @param string $total_ht
     */
    public function setTotal_ht(string $total_ht): void
    {
        $this->total_ht = $total_ht;
    }

    /**
     * @return string
     */
    public function getTotal_tva(): string
    {
        return $this->total_tva;
    }

    /**
     * @param string $total_tva
     */
    public function setTotal_tva(string $total_tva): void
    {
        $this->total_tva = $total_tva;
    }

    /**
     * @return string
     */
    public function getEtat(): string
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat(string $etat): void
    {
        $this->etat = $etat;
    }

    /**
     * @return string
     */
    public function getStatut(): string
    {
        return $this->statut;
    }

    /**
     * @param string $statut
     */
    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }

    /**
     * @return string
     */
    public function getClient(): string
    {
        return $this->client;
    }

    /**
     * @param string $client
     */
    public function setClient(string $client): void
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    public function getVendeurNom(): string
    {
        return $this->vendeurNom;
    }

    /**
     * @param string $vendeurNom
     */
    public function setVendeurNom(string $vendeurNom): void
    {
        $this->vendeurNom = $vendeurNom;
    }

    /**
     * @return string
     */
    public function getVendeurPrenom(): string
    {
        return $this->vendeurPrenom;
    }

    /**
     * @param string $vendeurPrenom
     */
    public function setVendeurPrenom(string $vendeurPrenom): void
    {
        $this->vendeurPrenom = $vendeurPrenom;
    }

    /**
     * @return array
     */
    public function getListeLigneCommande(): array
    {
        return $this->listeLigneCommande;
    }

    /**
     * @param array $listeLigneCommande
     */
    public function setListeLigneCommande(array $listeLigneCommande): void
    {
        $this->listeLigneCommande = $listeLigneCommande;
    }

    /**
     * @return bool
     */
    public function getAutorisationBD(): bool
    {
        return $this->autorisationBD;
    }

    /**
     * @param bool $autorisationBD
     */
    public function setAutorisationBD(bool $autorisationBD): void
    {
        $this->autorisationBD = $autorisationBD;
    }

    /**
     * @return string
     */
    public static function getMessageErreur(): string
    {
        return self::$messageErreur;
    }

    /**
     * @param string $messageErreur
     */
    public static function setMessageErreur(string $messageErreur): void
    {
        self::$messageErreur = $messageErreur;
    }

    /**
     * @return string
     */
    public static function getMessageSucces(): string
    {
        return self::$messageSucces;
    }

    /**
     * @param string $messageSucces
     */
    public static function setMessageSucces(string $messageSucces): void
    {
        self::$messageSucces = $messageSucces;
    }

}