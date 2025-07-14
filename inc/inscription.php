<?php
include("fonction.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bdd = connexionBDD();

    $nom = $_POST["nom"];
    $date = $_POST["date_naissance"];
    $genre = $_POST["genre"];
    $email = $_POST["email"];
    $ville = $_POST["ville"];
    $mdp = $_POST["mdp"];

    $sql = "INSERT INTO membre (nom, date_naissance, genre, email, ville, mdp, image_profil)
            VALUES ('$nom', '$date', '$genre', '$email', '$ville', '$mdp')";
    mysqli_query($bdd, $sql);

    header("Location: ../index.php");
}
?>
