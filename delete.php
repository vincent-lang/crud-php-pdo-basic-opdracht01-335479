<?php
echo "Het id is: " . $_GET['id'] . "<br>";

// Voeg de verbindingsgegevens toe aan delete.php
require('config.php');

// Maak de DataSourceName string
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        echo "Er is een verbinding gemaakt met de database<br>";
    } else {
        echo "Internal server error<br>";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Maak een delete query om een record in de tabel Persoon te verwijderen
$sql = "DELETE FROM persoon
        WHERE Id = :SQLId";

// Maak de query klaar voor het binden van een waarde aan de placeholder
$statement = $pdo->prepare($sql);

// Koppel de waarde van $_GET['id'] aan de placeholder :id
$statement->bindValue(':SQLId', $_GET['id'], PDO::PARAM_INT);

// Voer de query uit
$result = $statement->execute();

// var_dump($result);

if ($result) {
    // Geef een melding dat het gelukt is
    echo "Succesvol verwijderd van de record met id {$_GET['id']}";
    header('Refresh:3;url=read.php');
} else {
    echo "Internal server error, record is niet verwijderd";
    header('Refresh:3,url=read.php');
}
