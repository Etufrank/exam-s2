<?php
session_start();
include("fonction.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bdd = connexionBDD();
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];

    $sql = "SELECT * FROM membre WHERE email = '$email' AND mdp = '$mdp'";
    $res = mysqli_query($bdd, $sql);
    $data = mysqli_fetch_assoc($res);

    if ($data) {
        $_SESSION["id_membre"] = $data["id_membre"];
        header("Location: ../pages/liste_objets.php");
    } else {
        echo "Email ou mot de passe incorrect";
    }
}
?>

