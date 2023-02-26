<?php
/*La classe Voiture et la classe Avion
Définissez deux classes Voiture et Avion, héritant de la classe Vehicule et ayant les attributs supplémentaires suivants :*/



class Avion extends Vehicule
{
    /*
    Pour la classe Avion :
    son type de moteur ("HELICES" ou autre, nous utiliserons "REACTION" pour les exemples) ;
    son nombre d'heures de vol.
    */
    public const HELICES = 'HELICES';
    public const REACTION = 'REACTION';
    private string $typeMoteur;
    private int $nbHeuresVol;

    public function __construct(string $marque, int $dateAchat, float $prixAchat, string $typeMoteur, int $nbHeuresVol)
    {
        parent::__construct($marque, $dateAchat, $prixAchat);
        $this->typeMoteur = $typeMoteur;
        $this->nbHeuresVol = $nbHeuresVol;

    }

    /*Définissez, pour chacune de ces classes, un constructeur permettant l'initialisation explicite de l'ensemble des attributs, 
    ainsi qu'une méthode affichant la valeur des attributs. Constructeurs et méthodes d'affichage devront utiliser les méthodes appropriées de la classe parente !
    */
    public function affiche(): void
    {
        parent::affiche();
        echo " Type de moteur : " . $this->typeMoteur . "<br>" . "Nombre d heures de vol : " . $this->nbHeuresVol . " heures<br>";
    }
    /*
    Pour un avion, le prix courant est égal au prix d'achat, moins :
    10 % pour chaque tranche de 100 heures de vol s'il s'agit d'un avion à hélices.
    10 % pour chaque tranche de 1000 heures de vol pour les autres types de moteurs.
    Le prix doit rester positif (donc s'il est négatif, on le met à 0).
    */
    public function calculePrix(int $anneActuelle = null): float
    {
        $this->setPrixCourant($this->getPrixAchat());

        $nbTranche100ou1000heures = ($this->typeMoteur == self::HELICES) ? $this->nbHeuresVol / 100 : $this->nbHeuresVol / 1000; // comme une condition if , j ai utilisé l operateur  ternaire à la place
        for ($i = 0; $i < $nbTranche100ou1000heures; $i++) {
            $this->setPrixCourant($this->getPrixCourant() - ($this->getPrixCourant() * 10 / 100));
        }

        return $this->getPrixCourant();
    }




    public function getTypeMoteur(): string
    {
        return $this->typeMoteur;
    }
    public function setTypeMoteur(string $typeMoteur): void
    {
        $this->typeMoteur = $typeMoteur;
    }
    public function getNbHeuresVol(): int
    {
        return $this->nbHeuresVol;
    }
    public function setNbHeuresVol(int $nbHeuresVol): void
    {
        $this->nbHeuresVol = $nbHeuresVol;
    }



}