<?php
session_start();
include("../inc/fonction.php");
$bdd = connexionBDD();

// Filtrage
$filtre = isset($_GET["categorie"]) ? $_GET["categorie"] : "";

$sql = "SELECT o.*, c.nom_categorie, e.date_retour
        FROM objet o
        JOIN categorie_objet c ON o.id_categorie = c.id_categorie
        LEFT JOIN emprunt e ON o.id_objet = e.id_objet AND e.date_retour >= CURDATE()";

if ($filtre != "") {
    $sql .= " WHERE o.id_categorie = $filtre";
}

$res = mysqli_query($bdd, $sql);

// Liste des categories
$cat_sql = "SELECT * FROM categorie_objet";
$cat_res = mysqli_query($bdd, $cat_sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des objets</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .objet { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 4px; }
        .dispo { color: green; }
        .emprunte { color: red; }
    </style>
</head>
<body>

    <h1>Liste des objets</h1>

    <form method="GET">
        <label for="categorie">Filtrer par categorie :</label>
        <select name="categorie" id="categorie">
            <option value="">-- Toutes les categories --</option>
            <?php while ($cat = mysqli_fetch_assoc($cat_res)): ?>
                <option value="<?= $cat['id_categorie'] ?>" <?= ($filtre == $cat['id_categorie']) ? 'selected' : '' ?>>
                    <?= $cat['nom_categorie'] ?>
                </option>
            <?php endwhile; ?>
        </select>
        <button type="submit">Filtrer</button>
    </form>

    <section>
        <?php while ($obj = mysqli_fetch_assoc($res)): ?>
            <div class="objet">
                <h2><?= ($obj["nom_objet"]) ?></h2>
                <p>Categorie : <?= ($obj["nom_categorie"]) ?></p>
                <?php if ($obj["date_retour"]): ?>
                    <p class="emprunte">Emprunte jusqu'au : <?= $obj["date_retour"] ?></p>
                <?php else: ?>
                    <p class="dispo">Disponible</p>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </section>

</body>
</html>
