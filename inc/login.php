<?php
session_start();
include("fonction.php");
ini_set('display_errors', 1); error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];

    $user = verifierConnexion($email, $mdp);

    if ($user) {
        $_SESSION["id_membre"] = $user["id_membre"];
        header("Location: ../pages/liste_objets.php");
        exit();
    } else {
        echo "Email ou mot de passe incorrect";
    }
}
?>
