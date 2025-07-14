<?php
function connexionBDD() {
    return mysqli_connect("localhost", "root", "", "gestion_emprunt");
}
?>
