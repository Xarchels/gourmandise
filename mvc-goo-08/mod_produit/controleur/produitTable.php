<?php

class ProduitTable
{
    private $reference = "";
    private $designation = "";
    private $quantite = "";
    private $descriptif = "";
    private $prix_unitaire_HT = "";
    private $stock = "";
    private $poids_piece = "";

    private $prixKilo = "";
    private $place = "";

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
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getDesignation(): string
    {
        return $this->designation;
    }

    /**
     * @param string $designation
     */
    public function setDesignation(string $designation): void
    {
        if (empty($designation) || ctype_space($designation)) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir une désignation !<br>");
        }
        $this->designation = $designation;
    }

    /**
     * @return string
     */
    public function getQuantite(): string
    {
        return $this->quantite;
    }

    /**
     * @param string $quantite
     */
    public function setQuantite(string $quantite): void
    {
        if (empty($quantite) || ctype_space($quantite)) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir une quantité !<br>");
        }
        $this->quantite = $quantite;
    }

    /**
     * @return string
     */
    public function getDescriptif(): string
    {
        return $this->descriptif;
    }

    /**
     * @param string $descriptif
     */
    public function setDescriptif(string $descriptif): void
    {
        if ($descriptif <> "P" && $descriptif <> "G") {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Le descriptif doit être égal à P ou G !<br>");
        }
        $this->descriptif = $descriptif;
    }

    /**
     * @return string
     */
    public function getPrix_unitaire_HT(): string
    {
        return $this->prix_unitaire_HT;
    }

    /**
     * @param string $prix_unitaire_HT
     */
    public function setPrix_unitaire_HT(string $prix_unitaire_HT): void
    {
        if (empty($prix_unitaire_HT) || ctype_space($prix_unitaire_HT)) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir un prix unitaire hors taxe !<br>");
        }
        $this->prix_unitaire_HT = $prix_unitaire_HT;
    }

    /**
     * @return string
     */
    public function getStock(): string
    {
        return $this->stock;
    }

    /**
     * @param string $stock
     */
    public function setStock(string $stock): void
    {
        if (empty($stock) || ctype_space($stock)) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir un stock !<br>");
        }
        $this->stock = $stock;
    }

    /**
     * @return string
     */
    public function getPoids_piece(): string
    {
        return $this->poids_piece;
    }

    /**
     * @param string $poids_piece
     */
    public function setPoids_piece(string $poids_piece): void
    {
        if ((empty($poids_piece) && $poids_piece <> 0) || ctype_space($poids_piece)) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir un poids piece !<br>");
        }
        $this->poids_piece = $poids_piece;
    }

    /**
     * @return string
     */
    public function getPrixKilo(): string
    {
        return $this->prixKilo;
    }

    /**
     * @param string $prixKilo
     */
    public function setPrixKilo(string $prixKilo): void
    {
        $this->prixKilo = $prixKilo;
    }

    /**
     * @return string
     */
    public function getPlace(): string
    {
        return $this->place;
    }

    /**
     * @param string $place
     */
    public function setPlace(string $place): void
    {
        $this->place = $place;
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
        self::$messageErreur = self::$messageErreur . $messageErreur;
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
        self::$messageSucces = self::$messageSucces . $messageSucces;
    }

}