<?php
// Remplacez ceci par l'hôte de la base de données MySQL fourni par Railway
$servername = "mysql.railway.internal"; // Exemple : "us-cdbr-east-04.cleardb.com"
$username = "root"; // Nom d'utilisateur
$password = "gmwfiwDEPtcpnKLXSJjpKAvQFoOuNqbB"; // Mot de passe
$dbname = "railway"; // Nom de la base de données

// Crée une connexion à la base de données MySQL
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Configurez les paramètres du charset (optionnel mais recommandé)
$mysqli->set_charset("utf8");

// Vous pouvez maintenant utiliser $mysqli pour vos opérations sur la base de données
?>
