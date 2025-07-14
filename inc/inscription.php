<?php
include("fonction.php");
ini_set('display_errors', 1); error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $date = $_POST["date_naissance"];
    $genre = $_POST["genre"];
    $email = $_POST["email"];
    $ville = $_POST["ville"];
    $mdp = $_POST["mdp"];
    $image = $_POST["image"];

    if (insererMembre($nom, $date, $genre, $email, $ville, $mdp, $image)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
function verifierConnexion($email, $mdp) {
    $bdd = connexionBDD();
    $sql = "SELECT * FROM S2_membre WHERE email = '$email' AND mdp = '$mdp'";
    $res = mysqli_query($bdd, $sql);

    if ($res && mysqli_num_rows($res) > 0) {
        return mysqli_fetch_assoc($res);
    } else {
        return false; /
    }
}
?>
