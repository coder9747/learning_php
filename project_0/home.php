<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
session_start();    
if (!isset($_SESSION["username"])) {
    header("location:signup.php");
}
?>

<body>
    <h1>Welcome <?= $_SESSION["username"] ?></h1>
</body>

</html>