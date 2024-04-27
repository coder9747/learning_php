<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //connecting to database
    include("./connect.php");
    //getting data from user
    $email = $_POST["email"];
    $password = $_POST["password"];

    //checking if user is already present or not
    $sql = "select * from register where username = '$email'";
    $result = mysqli_query($cnn, $sql);
    if ($result) {
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            echo "email already exists";
        } else {
            //mean user is unique
            $sql = "insert into register (username,password) values ('$email','$password')";
            $result = mysqli_query($cnn, $sql);
            if ($result) {
                session_start();
                $_SESSION["username"] = $email;
                header("location:home.php");
            } else {
                echo "server error";
            }
        }
    }
}


?>

<body>
    <form action="" method="post" class="container mt-3">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Email</label>
            <input name="email" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Password</label>
            <input name="password" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
        </div>
        <button class="btn btn-primary">Sign Up</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>