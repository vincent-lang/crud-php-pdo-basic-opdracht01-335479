<?php

//* echo $_POST["firstname"] . " " . $_POST["infix"] . " " . $_POST["lastname"];

//* verbinding maken met de mysql database
require("config.php");

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Er is een verbinding gemaakt met de mysqldatabase";
    } else {
        // echo "Interne servererror, neem contact op met de databasebeheerder";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

//* we gaan een sql-query maken voor het wegschrijven van de formulier gegevens in de tabel persoon
//* schrijf de sql-insertquery
$sql = "INSERT INTO persoon (Id
                            ,Firstname 
                            ,Infix
                            ,Lastname
                            ,Phone_number
                            ,Street_name
                            ,House_number
                            ,Residence
                            ,Post_code
                            ,Land_name) 
        VALUES              (NULL
                            ,:firstname
                            ,:infix
                            ,:lastname
                            ,:phone_number
                            ,:street_name
                            ,:house_number
                            ,:residence
                            ,:post_code
                            ,:land_name);";
//* maak de sql-query gereed om te worden afgevuurd op de mysql-database
$statement = $pdo->prepare($sql);

//* de bindvalue method bind de $_POST waarde aan de placeholder 
$statement->bindValue(":firstname", $_POST['firstname'], PDO::PARAM_STR);
$statement->bindValue(":infix", $_POST['infix'], PDO::PARAM_STR);
$statement->bindValue(":lastname", $_POST['lastname'], PDO::PARAM_STR);
$statement->bindValue(":phone_number", $_POST['phone_number'], PDO::PARAM_STR);
$statement->bindValue(":street_name", $_POST['street_name'], PDO::PARAM_STR);
$statement->bindValue(":house_number", $_POST['house_number'], PDO::PARAM_STR);
$statement->bindValue(":residence", $_POST['residence'], PDO::PARAM_STR);
$statement->bindValue(":post_code", $_POST['post_code'], PDO::PARAM_STR);
$statement->bindValue(":land_name", $_POST['land_name'], PDO::PARAM_STR);

//* voer de sql-query uit op de database
$statement->execute();

//* link door naar read.php voor een overzicht van de gegevens in tabel persoon
header("location: read.php");