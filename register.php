<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie!";
    } else {
        echo "Erreur: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="login.php">Connexion</a></li>
                <li><a href="register.php">Inscription</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>Inscription</h1>
            <form action="register.php" method="post">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" value="S'inscrire">
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Ressources Lycée. Tous droits réservés.</p>
    </footer>
</body>
</html>
