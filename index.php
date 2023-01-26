<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/anon.png" type="image/x-icon">
    <title>PDO CRUD</title>
</head>

<body>
    <!-- if you dont know how, look up "php pdo" -->
    <h3>
        PRO CRUD
    </h3>
    <form action="create.php" method="post">
        <label for="firstname">Firstname:</label><br>
        <input type="text" id="firstname" name="firstname"><br>
        <br>
        <label for="infix">Infix:</label><br>
        <input type="text" id="infix" name="infix"><br>
        <br>
        <label for="lastname">Lastname:</label><br>
        <input type="text" id="lastname" name="lastname"><br>
        <br>
        <label for="phone_number">Phone number:</label><br>
        <input type="text" id="phone_number" name="phone_number"><br>
        <br>
        <label for="street_name">Street name:</label><br>
        <input type="text" id="street_name" name="street_name"><br>
        <br>
        <input type="submit" value="submit">
    </form>
</body>

</html>