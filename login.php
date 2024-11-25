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

// Récupérer les informations du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Requête SQL avec faille SQL (pas de préparation ou d'échappement des entrées)
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";

    // Exécution de la requête
    $result = $conn->query($sql);

    // Vérifier si l'utilisateur existe
    if ($result->num_rows > 0) {
        // Si l'utilisateur existe, rediriger vers la page de message
        header('Location: messages.php');
        exit();
    } else {
        // Identifiants incorrects
        echo "Identifiants incorrects!";
    }
}

// Fermer la connexion
$conn->close();
?>