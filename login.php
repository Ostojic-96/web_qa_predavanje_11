<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="login.php" method="POST">
    <label for="username">Korisničko ime</label>
    <input type="text" name="username" id="username" required><br>
    <label for="password">Lozinka</label>
    <input type="password" name="password" id="password" required>
    <input type="submit">
</form>

<?php
// Spojiti se na bazu

// Dohvatiti username i password iz $_POST

// Napisati query koji ce dohvatiti sve korisnike s tim usernameom i passwordom

// Ako je rezultat prazan znači da takav korisnik ne postoji u bazi odnosno nisu unijeli ispravne korisničke podatke

// Ako rezultat nije prazan odnosno ako su unijeli ispravne korisničke podatke onda ga redirectati na početnu stranicu

// Provjeriti je li se radi o POST metodi tj. da li korisnik pokusava podnijet formu
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    // Pokretanje sesije služi kako bi zapisali određene podatke u internu datoteku i tako imali pristup tim podacima kroz sve php datoteke i stranice.

    // Svaka sesija ima jedinstveni identifikator koji se spremi na korisnički pretraživač

    // U ovom slučaju ćemo zapisati u sesiju da je korisnik prijavljen tako da kada ode na početnu stranicu to možemo i provjeriti

    // Možete provjeriti cookiese nakon uspješne prijave (Console -> Application tab -> Cookies) te ćete vidjeti cookie s nazivom PHPSESSID

    // To predstavlja identifikator za sesiju te se to automatski šalje na server, a zatim PHP provjeri kome ta sesija pripada
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $servername = 'localhost';
    $dbname = 'filmovi';
    $dbusername = 'osta';
    $dbpassword = '123456';

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    if (count($result) === 0) {
        echo 'Niste upisali ispravne podatke';
    } else {
        $_SESSION['logged_in'] = true;
        header("Location: /");
        exit();
    }
}
?>
</body>
</html>
