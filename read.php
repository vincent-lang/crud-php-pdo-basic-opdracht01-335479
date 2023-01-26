<?php

// Maak een verbinding met de MYSQL server & database
// 1. Voeg een configuratiebestand toe
require('config.php');

// 2. Maak een data source name string
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    // 3. Maak een pdo-object aan voor het maken van de verbinding
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Er is verbinding gemaakt met de MySQL database";
    } else {
        echo 'Internal server error, contact database admin';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

// 4. Maak een select query voor het opvragen van de gegevens
$sql = "SELECT Id
            ,Firstname
            ,Infix
            ,Lastname
        FROM persoon
        ORDER BY Id ASC";

// 5. We bereiden de query voor met de method prepare
$statement = $pdo->prepare($sql);

// 6. We vuren de query af op de MySQL-Database
$statement->execute();

// 7. We stoppen het resultaat van de query in de variable $result
$result = $statement->fetchAll(PDO::FETCH_OBJ);

// echo $result[0]->Voornaam;
// var_dump($result);

$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
                <td>$info->Id</td>
                <td>$info->Firstname</td>
                <td>$info->Infix</td>
                <td>$info->Lastname</td>
                <td>
                    <a href='delete.php?id={$info->Id}'>
                        <img src='img/b_drop.png' alt='Drop'</img>
                    </a>
                </td>
                <td>
                    <a href='update.php?id={$info->Id}'>
                        <img src='img/b_edit.png' alt='Edit'</img>
                    </a>
                </td>
             <tr>";
}

?>


<h3>Persoonsgegevens</h3>
<a href="index.php"><button>Nieuw Persoon</button></a>
<table border="1">
    <thead>
        <th>Id</th>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?= $rows; ?>
    </tbody>
</table>