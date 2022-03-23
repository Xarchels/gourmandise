<?php

class AuthentificationTable
{
    //1. Déclaration des propriétés
    private string $login = "";
    private string $password = "";
    private bool $autorisationSession = true;
    private static string $messageErreur = "";

    //2. Constructeur
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

    //3. Getters et setters

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
    public function setLogin($login): void
    {
        if (empty($login) || ctype_space($login)) {
            $this->setAutorisationSession(false);
            self::setMessageErreur("Vous devez saisir un login");
        }
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
    public function setPassword($password): void
    {
        if (!empty($password) && !ctype_space($password)) {
            //Chiffrage du mot de passe envoyé pour contrôle en BD
            //Le mot de passe : sowhat
            $gauche = "ar30&y%";
            $droite = "tk!@";
            $this->password = hash("ripemd128", "$gauche$password$droite");
        } else {
            $this->setAutorisationSession(false);
            self::setMessageErreur("Vous devez saisir votre mot de passe");
            $this->password = "";
        }
    }

    /**
     * @return bool
     */
    public function getAutorisationSession(): bool
    {
        return $this->autorisationSession;
    }

    /**
     * @param bool $autorisationSession
     */
    public function setAutorisationSession($autorisationSession): void
    {
        $this->autorisationSession = $autorisationSession;
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
    public static function setMessageErreur($messageErreur): void
    {
        if (self::getMessageErreur() == "") {
            self::$messageErreur = $messageErreur;
        } else {
            self::$messageErreur = self::$messageErreur . "<br>" . $messageErreur;
        }
    }

}