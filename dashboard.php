<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $file = 'uploads/' . basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $file);

    $sql = "INSERT INTO notes (username, title, content, file) VALUES ('$user', '$title', '$content', '$file')";
    if ($conn->query($sql) === TRUE) {
        echo "Fiche créée avec succès!";
    } else {
        echo "Erreur: " . $conn->error;
    }
}

$sql = "SELECT * FROM notes WHERE username='$user'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Compte</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="dashboard.php">Espace Compte</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>Bienvenue, <?php echo htmlspecialchars($user); ?>!</h1>
            <form action="dashboard.php" method="post" enctype="multipart/form-data">
                <h2>Créer une fiche</h2>
                <label for="title">Titre:</label>
                <input type="text" id="title" name="title" required><br><br>
                <label for="content">Contenu:</label>
                <textarea id="content" name="content" rows="5" required></textarea><br><br>
                <label for="file">Télécharger un fichier:</label>
                <input type="file" id="file" name="file"><br><br>
                <input type="submit" name="create" value="Créer Fiche">
            </form>

            <h2>Vos fiches</h2>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="note">
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
                    <?php if ($row['file']): ?>
                        <a href="<?php echo htmlspecialchars($row['file']); ?>" download>Télécharger le fichier</a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Ressources Lycée. Tous droits réservés.</p>
    </footer>
</body>
</html>
