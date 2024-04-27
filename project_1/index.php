<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<?php
session_start();

if (isset($_SESSION["username"]) && isset($_SESSION["id"])) {
    echo '<div class="alert alert-success" role="alert">
    Welcome ' . $_SESSION["username"] . ' to my note app  </div>';
} else {
    echo '<div class="alert alert-danger" role="alert">
    Please Login   </div>';
}


?>



<body>
    <h1 class="text-center">Welcome To My Note App</h1>
    <?php
    if (!isset($_SESSION["username"])) { ?>
        <a href="./auth/signin.php">Login</a>
    <?php } else { ?>
        <a href="./auth/signin.php">Logout</a>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>