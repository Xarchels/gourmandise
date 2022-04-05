<?php

class LigneCommandeTable
{
    private $numero = "";
    private $numero_ligne = "";
    private $reference = "";
    private $designation = "";
    private $quantite_demandee = "";
    private $prix_ht = "";
    private float $prix = 0;

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
    public function getNumero_ligne(): string
    {
        return $this->numero_ligne;
    }

    /**
     * @param string $numero_ligne
     */
    public function setNumero_ligne(string $numero_ligne): void
    {
        $this->numero_ligne = $numero_ligne;
    }

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
        $this->designation = $designation;
    }

    /**
     * @return string
     */
    public function getQuantite_demandee(): string
    {
        return $this->quantite_demandee;
    }

    /**
     * @param string $quantite_demandee
     */
    public function setQuantite_demandee(string $quantite_demandee): void
    {
        $this->quantite_demandee = $quantite_demandee;
    }

    /**
     * @return
     */
    public function getPrix_ht()
    {
        return $this->prix_ht;
    }

    /**
     * @param $prix_ht
     */
    public function setPrix_ht($prix_ht): void
    {
        $this->prix_ht = number_format($prix_ht,2);
    }

    /**
     * @return
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param $prix
     */
    public function setPrix($prix)
    {
        $this->prix = number_format($prix,2);
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