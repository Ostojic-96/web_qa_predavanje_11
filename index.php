<?php
session_start();
if ($_SESSION['logged_in'] !== true) {
    echo 'Niste prijavljeni';
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web stranica</title>
</head>
<body>
<h1>Početna stranica</h1>
</body>
</html>
