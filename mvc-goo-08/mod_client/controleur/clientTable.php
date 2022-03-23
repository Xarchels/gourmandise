<?php

class ClientTable
{
    private $codec = "";
    private $nom = "";
    private $adresse = "";
    private $cp = "";
    private $ville = "";
    private $telephone = "";

    private $CA = "";
    private $PourcCA = "";
    private $listeProduit = [];

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

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        if (empty($nom) || ctype_space($nom)) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir un nom !<br>");
        }
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse(string $adresse): void
    {
        if (empty($adresse) || ctype_space($adresse)) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir une adresse !<br>");
        }
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getCp(): string
    {
        return $this->cp;
    }

    /**
     * @param string $cp
     */
    public function setCp(string $cp): void
    {
        if (empty($cp) || ctype_space($cp)) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir un code postal !<br>");
        }
        $this->cp = $cp;
    }

    /**
     * @return string
     */
    public function getVille(): string
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille(string $ville): void
    {
        if (empty($ville) || ctype_space($ville)) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir une ville !<br>");
        }
        $this->ville = $ville;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone): void
    {
        if (empty($telephone) || ctype_space($telephone)) {
            $this->setAutorisationBD(false);
            self::setMessageErreur("Vous devez saisir un numéro de téléphone !<br>");
        }
        $this->telephone = $telephone;
    }

    /**
     * @return string
     */
    public function getCA(): string
    {
        return $this->CA;
    }

    /**
     * @param string $CA
     */
    public function setCA(string $CA): void
    {
        $this->CA = $CA;
    }

    /**
     * @return string
     */
    public function getPourcCA(): string
    {
        return $this->PourcCA;
    }

    /**
     * @param string $PourcCA
     */
    public function setPourcCA(string $PourcCA): void
    {
        $this->PourcCA = $PourcCA;
    }

    /**
     * @return array
     */
    public function getListeProduit(): array
    {
        return $this->listeProduit;
    }

    /**
     * @param array $listeProduit
     */
    public function setListeProduit(array $listeProduit): void
    {
        $this->listeProduit = $listeProduit;
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