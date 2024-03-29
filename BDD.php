<!DOCTYPE html>
<html lang="en">
<!-- Ecrire en PHP -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        <?php echo '<p>Premier paragraphe</p>'; ?>
    </h1>
    <h2>
        <?php echo '<p>Deuxieme paragraphe</p>'; ?>
    </h2>

    <h3>
        <?php $Couleur = "Red";
        echo "$Couleur"; ?>
    </h3>
    <!-- Faire un tableau + une boucle qui affiche les éléments du tableau -->
    <p>
        <?php
        $tableau = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        for ($i = 0; $i < count($tableau); $i++) {
            echo "$tableau[$i]";
        }
        ?>
    </p>
    <!-- Créer une connexion MySql entre base de données  -->
    <p>
        <?php echo 'Base de données'; ?>
    </p>
    <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $pdo = new PDO("mysql:host=$servername;dbname=pays", $username, $password);

    $result = $pdo->prepare("Select Nom, id From pays_table");
    $result->execute();
    //var_dump($resultat);
    
    //  print "$row[Nom]\n"; Faire un tableau :
    ?>
    
    <table>
        <thead>
            <th>ID</th>
            <th>Nom</th>
        </thead>
        <tbody>
            <?php
            while ($pays = $result->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td>
                        <?= $pays['id'] ?>
                    </td>
                    <td>
                        <?= $pays['Nom'] ?>
                    </td>
                </tr>
                <?php
            }
            ?>
    </tbody>
        </table>

    <!-- Inserer des données en base -->

        <?php
        // $result = $pdo->prepare("INSERT INTO pays_table (Nom) Values ('Suisse')");
        // $result->execute();

        ?>
        <!-- Les formulaires -->
        <br><br><br>

        <form method="post" action="ajoutpays.php">
            <label for = "nom">Nom :</label>
            <input id = "nom" type = "text" name="nom" placeholder="Veuillez entrer votre nom"/> 
            <div class="Button">
                <button type ="submit">Envoyer le message</button>
            </div>
        
        </form>

    </body>

</html>
