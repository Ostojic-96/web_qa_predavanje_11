<?php
// Ako nije POST metoda preskoci sve ovo, ne radi nista, prikazi samo HTML formu
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $birthYear = $_POST['birth_year'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $servername = 'localhost';
    $dbname = 'filmovi';
    $dbusername = 'osta';
    $dbpassword = '123456';

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    $sql = "INSERT INTO users (first_name, last_name, birth_year, username, password) VALUES ('$firstName', '$lastName', '$birthYear', '$username', '$password')";
    $conn->exec($sql);
    echo 'Uspješno ste se registrirali. Možete se prijaviti';
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registracija</title>
</head>
<body>
<form action="register.php" method="POST">
    <label for="first_name">Ime</label>
    <input type="text" name="first_name" id="first_name"><br>
    <label for="last_name">Prezime</label>
    <input type="text" name="last_name" id="last_name"><br>
    <label for="birth_year">Godište</label>
    <input type="number" name="birth_year" id="birth_year"><br>
    <label for="username">Korisničko ime</label>
    <input type="text" name="username" id="username"><br>
    <label for="password">Lozinka</label>
    <input type="password" name="password" id="password">
    <input type="submit">
</form>
</body>
</html>
