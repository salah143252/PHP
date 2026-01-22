<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Livres</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { max-width: 1000px; margin: 0 auto; background: white; padding: 20px; }
        h1 { color: #333; }
        .search-box { margin: 20px 0; padding: 15px; background: #e9ecef; }
        input[type="text"] { padding: 8px; width: 300px; border: 1px solid #ccc; }
        button { padding: 8px 20px; background: #007bff; color: white; border: none; cursor: pointer; }
        .total { background: #d4edda; padding: 15px; margin: 20px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #007bff; color: white; }
        .disponible { color: green; font-weight: bold; }
        .indisponible { color: red; }
        .book-img { width: 80px; height: 120px; object-fit: cover; border: 1px solid #ddd; }
    </style>
</head>
<body>

<?php
$livres = [
    ["titre" => "Apprendre PHP", "auteur" => "Fatine Chebab", "annee" => 2024, "prix" => 120, "disponible" => true, "photo" => "https://picsum.photos/seed/php/100/150"],
    ["titre" => "JavaScript pour débutants", "auteur" => "Ali Ahmed", "annee" => 2023, "prix" => 100, "disponible" => false, "photo" => "https://picsum.photos/seed/js/100/150"],
    ["titre" => "HTML & CSS", "auteur" => "Sara Benali", "annee" => 2022, "prix" => 80, "disponible" => true, "photo" => "https://picsum.photos/seed/html/100/150"],
    ["titre" => "Python Avancé", "auteur" => "Mohammed Alami", "annee" => 2024, "prix" => 150, "disponible" => true, "photo" => "https://picsum.photos/seed/python/100/150"],
    ["titre" => "Base de données MySQL", "auteur" => "Leila Mansouri", "annee" => 2023, "prix" => 110, "disponible" => true, "photo" => "https://picsum.photos/seed/mysql/100/150"],
    ["titre" => "React & Redux", "auteur" => "Youssef Karimi", "annee" => 2024, "prix" => 135, "disponible" => false, "photo" => "https://picsum.photos/seed/react/100/150"],
    ["titre" => "Laravel pour tous", "auteur" => "Nadia Benjelloun", "annee" => 2023, "prix" => 125, "disponible" => true, "photo" => "https://picsum.photos/seed/laravel/100/150"],
    ["titre" => "DevOps avec Docker", "auteur" => "Karim Tazi", "annee" => 2024, "prix" => 140, "disponible" => true, "photo" => "https://picsum.photos/seed/docker/100/150"],
    ["titre" => "Intelligence Artificielle", "auteur" => "Amina Fassi", "annee" => 2022, "prix" => 160, "disponible" => false, "photo" => "https://picsum.photos/seed/ai/100/150"],
    ["titre" => "Cybersécurité moderne", "auteur" => "Omar Idrissi", "annee" => 2024, "prix" => 145, "disponible" => true, "photo" => "https://picsum.photos/seed/cyber/100/150"]
];

$recherche = "";
if(isset($_GET['recherche'])) {
    $recherche = $_GET['recherche'];
}

function calculerTotal($livres) {
    $total = 0;
    for($i = 0; $i < count($livres); $i++) {
        if($livres[$i]['disponible'] == true) {
            $total = $total + $livres[$i]['prix'];
        }
    }
    return $total;
}

function rechercherLivre($livres, $recherche) {
    $resultats = [];
    for($i = 0; $i < count($livres); $i++) {
        if(stripos($livres[$i]['titre'], $recherche) !== false) {
            $resultats[] = $livres[$i];
        }
    }
    return $resultats;
}

$total = calculerTotal($livres);

?>

<div class="container">
    <h1>Gestion des Livres</h1>
    
    <div class="search-box">
        <form method="GET">
            <input type="text" name="recherche" placeholder="Rechercher un livre..." value="<?php echo $recherche; ?>">
            <button type="submit">Rechercher</button>
            <?php if($recherche != ""): ?>
                <a href="?"><button type="button">Réinitialiser</button></a>
            <?php endif; ?>
        </form>
    </div>
    
    <div class="total">
        <strong>Total des prix des livres disponibles: </strong><?php echo $total; ?> DH
    </div>
    
    <h2>Liste des livres disponibles</h2>
    
    <table>
        <tr>
            <th>Photo</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Année</th>
            <th>Prix</th>
            <th>Disponibilité</th>
        </tr>
        
        <?php
        if($recherche != "") {
            $livres = rechercherLivre($livres, $recherche);
            
            if(count($livres) == 0) {
                echo "<tr><td colspan='6'>Aucun livre trouvé</td></tr>";
            }
        }
        
        for($i = 0; $i < count($livres); $i++) {
            if($recherche == "" && $livres[$i]['disponible'] == false) {
                continue;
            }
            
            echo "<tr>";
            echo "<td><img src='" . $livres[$i]['photo'] . "' class='book-img' alt='Livre'></td>";
            echo "<td>" . $livres[$i]['titre'] . "</td>";
            echo "<td>" . $livres[$i]['auteur'] . "</td>";
            echo "<td>" . $livres[$i]['annee'] . "</td>";
            echo "<td>" . $livres[$i]['prix'] . " DH</td>";
            
            if($livres[$i]['disponible'] == true) {
                echo "<td class='disponible'>Disponible</td>";
            } else {
                echo "<td class='indisponible'>Indisponible</td>";
            }
            
            echo "</tr>";
        }
        ?>
    </table>
</div>

</body>
</html>