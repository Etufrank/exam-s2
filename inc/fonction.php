<?php
function connexionBDD() {
    $host = "172.60.0.15";
    $user = "ETU004223";
    $pass = "8kEa3yOe";
    $db = "db_s2_ETU004223";
    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn) {
        die("Connexion echouee : " . mysqli_connect_error());
    }
    return $conn;
}

function getObjets($filtre = "") {
    $bdd = connexionBDD();
    $sql = "SELECT o.*, c.nom_categorie, e.date_retour
            FROM S2_objet o
            JOIN S2_categorie_objet c ON o.id_categorie = c.id_categorie
            LEFT JOIN S2_emprunt e ON o.id_objet = e.id_objet AND e.date_retour >= CURDATE()";
    if ($filtre != "") {
        $sql .= " WHERE o.id_categorie = $filtre";
    }
    return mysqli_query($bdd, $sql);
}

function getCategories() {
    $bdd = connexionBDD();
    $sql = "SELECT * FROM S2_categorie_objet";
    return mysqli_query($bdd, $sql);
}

function insererMembre($nom, $date_naissance, $genre, $email, $ville, $mdp, $image_profil) {
    $bdd = connexionBDD();

    $sql = "INSERT INTO S2_membre (nom, date_naissance, genre, email, ville, mdp, image_profil)
            VALUES ('$nom', '$date_naissance', '$genre', '$email', '$ville', '$mdp', '$image_profil')";

    return mysqli_query($bdd, $sql);
}
function verifierConnexion($email, $mdp) {
    $bdd = connexionBDD();
    $sql = "SELECT * FROM S2_membre WHERE email = '$email' AND mdp = '$mdp'";
    $res = mysqli_query($bdd, $sql);

    if ($res && mysqli_num_rows($res) > 0) {
        return mysqli_fetch_assoc($res); 
    } else {
        return false;
    }
}

?>

