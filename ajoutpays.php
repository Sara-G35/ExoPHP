<!-- Envoyer un formulaire vers la base de données -->
<?php 
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $pdo = new PDO("mysql:host=$servername;dbname=pays", $username, $password);
    $result = $pdo->prepare("INSERT INTO pays_table (Nom) Values (?)");
    $result->execute([$_POST['nom']]);
    header('location:BDD.php');
?>
