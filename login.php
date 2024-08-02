<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $username;
            header("Location: dashboard.php");
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Nom d'utilisateur non trouvé.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
            <h1>Connexion</h1>
            <form action="login.php" method="post">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" value="Se connecter">
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Ressources Lycée. Tous droits réservés.</p>
    </footer>
</body>
</html>
