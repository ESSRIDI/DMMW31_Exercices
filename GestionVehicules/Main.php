<?php

require_once "Models/Vehicule.php";
require_once "Models/Voiture.php";
require_once "Models/Avion.php";


//instance class Vehicule
$vehicule1 = new Vehicule("Renault", 2020, 15000);


//instances class Voiture
$maVoiture = new Voiture("Fiat", 2020, 15000, 1402, 3, 70, 28000);
$maVoitureDeSport = new Voiture("Ferrari", 2021, 450000, 8555, 2, 228, 100000);

//instances class Avion
$transavia = new Avion("Airbus", 1999, 18000000, Avion::REACTION, 2500);
$airFrance = new Avion("Airbus2", 1999, 18000000, Avion::HELICES, 2500);

$vehicule1->affiche();
echo "Le prix courant est de : " . "<b>" . $vehicule1->calculePrix(2023), " €</b><br>";
echo "<br>";

$maVoiture->affiche();
echo "Le prix courant est de : " . "<b>" . $maVoiture->calculePrix(2023), " €</b><br>";
echo "<br>";

$maVoitureDeSport->affiche();
echo "Le prix courant est de : " . "<b>" . $maVoitureDeSport->calculePrix(2023), " €</b><br>";
echo "<br>";

$transavia->affiche();
echo "Le prix courant est de : " . "<b>" . $transavia->calculePrix(), " €</b><br>";
echo "<br>";

$airFrance->affiche();
echo "Le prix courant est de : " . "<b>" . $airFrance->calculePrix(), " €</b><br>";