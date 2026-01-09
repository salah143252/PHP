<?php
$nom = "Alice";
$age = 25;
$prix = 19.99;
$estConnecte = true;

echo "Nom : " . $nom . "<br>";
echo "Âge : " . $age . "<br>";
echo "Prix : " . $prix . " €<br>";
echo "Connecté : " . ($estConnecte ? "Oui" : "Non") . "<br>";

var_dump($nom);
$nombre = "10";
$nombreInt = (int)$nombre;
echo "Conversion : " . $nombreInt;