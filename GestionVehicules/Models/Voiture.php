<?php

class Voiture extends Vehicule
{
    /*
    La classe Voiture et la classe Avion
    Définissez deux classes Voiture et Avion, héritant de la classe Vehicule et ayant les attributs supplémentaires suivants :
    Pour la classe Voiture :
    * sa cylindrée ;
    * son nombre de portes ;
    * sa puissance ;
    * son kilométrage.
    */

    private int $cylindree;
    private int $nbPortes;
    private int $puissance;
    private int $kilometrage;

    public function __construct(string $marque, int $dateAchat, float $prixAchat, int $cylindree, int $nbPortes, int $puissance, int $kilometrage)
    {
        parent::__construct($marque, $dateAchat, $prixAchat);

        $this->cylindree = $cylindree;
        $this->nbPortes = $nbPortes;
        $this->puissance = $puissance;
        $this->kilometrage = $kilometrage;
    }

    /*Définissez, pour chacune de ces classes, un constructeur permettant l'initialisation explicite de l'ensemble des attributs, 
    ainsi qu'une méthode affichant la valeur des attributs. Constructeurs et méthodes d'affichage devront utiliser les méthodes appropriées de la classe parente !
    */

    public function affiche(): void
    {
        parent::affiche();
        echo " Cylindrée : " . $this->cylindree . " cm3/tr<br>" . "Nombre de portes : " . $this->nbPortes . "<br>" . "Puissance : " . $this->puissance . " ch<br>" . "Kilométrage : " . $this->kilometrage . " Km<br>";
    }

    /*
    Pour une voiture, le prix courant est égal au prix d'achat, moins :
    2% pour chaque année depuis l'achat jusqu'à la date actuelle
    5% pour chaque tranche de 10000km parcourus (on arrondit à la tranche la plus proche)
    10% s'il s'agit d'un véhicule de marque "Renault" ou "Fiat" (ou d'autres marques de votre choix)
    et plus 20% s'il s'agit d'un véhicule de marque "Ferrari" ou "Porsche" (idem).
    
    */
    public function calculePrix(int $anneActuelle = null): float
    {
        $this->setPrixCourant($this->getPrixAchat());
        $diffAnnee = $anneActuelle - $this->getDateAchat();
        for ($i = 0; $i < $diffAnnee; $i++) {
            $this->setPrixCourant($this->getPrixCourant() - ($this->getPrixCourant() * 2 / 100));
        }
        $nbTranche10000Km = $this->kilometrage / 10000;
        for ($j = 0; $j < floor($nbTranche10000Km); $j++) {
            $this->setPrixCourant($this->getPrixCourant() - ($this->getPrixCourant() * 5 / 100));
        }
        switch ($this->getMarque()) {
            case "Renault" || "Fiat":
                $this->setPrixCourant($this->getPrixCourant() - ($this->getPrixCourant() * 10 / 100));
                break;
            case "Ferrari" || "Porsche":
                $this->setPrixCourant($this->getPrixCourant() - ($this->getPrixCourant() * 20 / 100));
                break;

        }

        return $this->getPrixCourant();
    }


    public function getCylindree(): int
    {
        return $this->cylindree;
    }
    public function setCylindree(int $cylindree): void
    {
        $this->cylindree = $cylindree;
    }

    public function getNbPortes(): int
    {
        return $this->nbPortes;
    }
    public function setNbPortes(int $nbPortes): void
    {
        $this->nbPortes = $nbPortes;
    }

    public function getPuissance(): int
    {
        return $this->puissance;
    }
    public function setPuissance(int $puissance): void
    {
        $this->puissance = $puissance;
    }
    public function getKilometrage(): int
    {
        return $this->kilometrage;
    }
    public function setKilometrage(int $kilometrage): void
    {
        $this->kilometrage = $kilometrage;
    }
}