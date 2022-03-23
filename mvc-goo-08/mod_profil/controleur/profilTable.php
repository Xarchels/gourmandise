<?php

class ProfilTable
{
    private $codev = "";
    private $prenom = "";
    private $nom = "";
    private $adresse = "";
    private $cp = "";
    private $ville = "";
    private $telephone = "";
    private $login = "";
    private $password = "";

    private $montant = "";

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
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
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
        $this->telephone = $telephone;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getMontant(): string
    {
        return $this->montant;
    }

    /**
     * @param string $montant
     */
    public function setMontant(string $montant): void
    {
        $this->montant = $montant;
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