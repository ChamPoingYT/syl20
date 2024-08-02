<?php
$servername = "localhost";
$username = "root";
$password = ""; // Mettre votre mot de passe ici
$dbname = "lycee";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
