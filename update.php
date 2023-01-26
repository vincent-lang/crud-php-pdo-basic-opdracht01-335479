<?php
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Verbinding";
    } else {
        // echo "Interne error";
    }
} catch (PDOException $e) {
    $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo "Er is op het formulier knopje gedrukt";
    // var_dump($_POST);

    try {

        $sql = "UPDATE Persoon
            Set     Firstname = :Firstname,
                    Infix = :Infix,
                    Lastname = :Lastname,
                    Phone_number = :phone_number,
                    Street_name = :street_name
                WHERE   Id = :Id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(":Id", $_POST["id"], PDO::PARAM_INT);
        $statement->bindValue(":Firstname", $_POST["firstname"], pdo::PARAM_STR);
        $statement->bindValue(":Infix", $_POST["infix"], pdo::PARAM_STR);
        $statement->bindValue(":Lastname", $_POST["lastname"], pdo::PARAM_STR);
        $statement->bindValue(":phone_number", $_POST["phone_number"], pdo::PARAM_STR);
        $statement->bindValue(":street_name", $_POST["street_name"], pdo::PARAM_STR);

        $statement->execute();

        echo "het record is geupdate";
        header('Refresh:3; url=read.php');

        exit();
    } catch (PDOException $e) {
        echo "het record is niet geupdate, probeer het opnieuw";
        header("Refresh:3; url=read.php");
    }
}

$sql = "SELECT Id
              ,Firstname as VN
              ,Infix as TV
              ,Lastname as AN
              ,Phone_number as PH
              ,Street_name as SN
        FROM Persoon
        WHERE Id = :Id";

$statement = $pdo->prepare($sql);

$statement->bindValue(':Id', $_GET['id'], PDO::PARAM_INT);

$statement->execute();

$result = $statement->fetch(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>PDO CRUD</title>
</head>

<body>
    <h3>Wijzig het record</h3>

    <form action="update.php" method="post">
        <label for="firstname">Firstname:</label><br>
        <input type="text" id="firstname" name="firstname" value="<?= $result->VN ?>"><br>
        <br>
        <label for="infix">Infix:</label><br>
        <input type="text" id="infix" name="infix" value="<?= $result->TV ?>"><br>
        <br>
        <label for="lastname">Lastname:</label><br>
        <input type="text" id="lastname" name="lastname" value="<?= $result->AN ?>"><br>
        <br>
        <label for="phone_number">Phone number:</label><br>
        <input type="text" id="phone_number" name="phone_number" value="<?= $result->PH ?>"><br>
        <br>
        <label for="Street_name">Street name:</label><br>
        <input type="text" id="street_name" name="street_name" value="<?= $result->SN ?>"><br>
        <br>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="submit" value="Verstuur">

    </form>
</body>

</html>