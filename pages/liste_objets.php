<?php
session_start();
include("../inc/fonction.php");

$filtre = isset($_GET["categorie"]) ? $_GET["categorie"] : "";

$res = getObjets($filtre);
$cat_res = getCategories();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des objets</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/css/liste.css">


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
