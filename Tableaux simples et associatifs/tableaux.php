<?php
$animaux = ["Chat", "Chien", "Lapin"];
echo "Premier animal : " . $animaux[0] . "<br>";
foreach ($animaux as $animal) {
    echo "Animal : $animal <br>";
}
$voiture = [
    "marque" => "Toyota",
    "modele" => "Corolla",
    "année" => 2020
];
echo "Modèle : " . $voiture["modele"] . "<br>";
$fruits = ["Pomme", "Banane"];
array_push($fruits, "Mangue"); // Ajoute "Mangue"
unset($fruits[1]); // Supprime "Banane"
echo "Nombre de fruits : " . count($fruits);

