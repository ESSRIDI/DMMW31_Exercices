<?php

class Vehicule
{
    /*
    Définissez une classe Vehicule qui a pour attributs des informations valables pour tout type de véhicule :
    - sa marque ;
    - sa date d'achat ;
    - son prix d'achat ;
    */

    private string $marque;
    private int $dateAchat;
    private float $prixAchat;
    private float $prixCourant; // (1)Le prix courant sera calculé plus tard

    /*
    Définissez un constructeur prenant en paramètre les trois attributs correspondant à la marque, 
    la date d'achat et le prix d'achat. (Le prix courant sera calculé plus tard)(1)).
    */
    public function __construct(string $marque, int $dateAchat, float $prixAchat)
    {
        $this->marque = $marque;
        $this->dateAchat = $dateAchat;
        $this->prixAchat = $prixAchat;

    }
    /*Définissez une méthode publique void affiche() qui affiche l'état de l'instance, 
    c'est-à-dire la valeur de ses attributs.*/

    public function affiche(): void
    {
        echo " Marque : " . $this->marque . "<br>" . "Date d achat : " . $this->dateAchat . "<br>" . "Prix d achat : " . $this->prixAchat . " €<br>";
    }


    /*
    Ajoutez une méthode float calculePrix(int anneActuelle) dans la classe Vehicule qui, à ce niveau, 
    fixe le prix courant au prix d'achat moins 1% par année (entre la date d'achat et la date actuelle).
    */

    public function calculePrix(int $anneActuelle = null): float
    {
        $this->prixCourant = $this->prixAchat;
        $diffAnnee = $anneActuelle - $this->dateAchat;
        for ($i = 0; $i < $diffAnnee; $i++) {
            $this->prixCourant -= ($this->prixCourant / 100);
        }
        return $this->prixCourant;
    }



    public function getMarque(): string
    {
        return $this->marque;
    }
    public function setMarque(string $marque): void
    {
        $this->marque = $marque;
    }
    public function getDateAchat(): int
    {
        return $this->dateAchat;
    }
    public function setDateAchat(int $dateAchat): void
    {
        $this->dateAchat = $dateAchat;
    }
    public function getPrixAchat(): float
    {
        return $this->prixAchat;
    }
    public function setPrixAchat(float $prixAchat): void
    {
        $this->prixAchat = $prixAchat;
    }
    public function getPrixCourant(): float
    {
        return $this->prixCourant;
    }
    public function setPrixCourant(float $prixCourant): void
    {
        $this->prixCourant = $prixCourant;
    }

}