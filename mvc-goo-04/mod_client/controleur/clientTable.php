<?php

class ClientTable
{
    private $codec = "";
    private $nom = "";
    private $adresse = "";
    private $cp = "";
    private $ville = "";
    private $telephone = "";

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
}