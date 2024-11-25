<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Utilisateur MySQL
$password = ""; // Mot de passe MySQL
$dbname = "test_db";  // Base de données à créer

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST['message'];

    // Insérer le message dans la base de données (encore une faille SQL ici)
    $sql = "INSERT INTO messages (message) VALUES ('$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Message envoyé !<br>";
    } else {
        echo "Erreur : " . $conn->error;
    }
}

// Afficher les messages déjà envoyés
$sql = "SELECT * FROM messages";
$result = $conn->query($sql);

echo "<h2>Messages :</h2>";
while ($row = $result->fetch_assoc()) {
    echo "<div>" . htmlspecialchars($row['message']) . "</div><br>";
}

// Fermer la connexion
$conn->close();
?>

<h2>Écrire un message :</h2>
<form action="messages.php" method="POST">
    <textarea name="message" id="message" rows="4" cols="50" required></textarea><br><br>
    <input type="submit" value="Envoyer le message">
</form>