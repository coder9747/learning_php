<?php include("./header.php") ?>

<?php

if (isset($_POST["submit"])) {
    include("./connect.php");
    $adhar = $_POST["adhar"];
    $password = $_POST["password"];

    $sql = "select * from user where adhar = '$adhar'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row["password"]) {

            session_start();
            $_SESSION["id"] = $row["id"];
            header("location:./index.php");
        } else {
            echo "password is incorrect ";
        }
    } else {
        echo "user not exists";
    }
}
?>
<form class="container" action="" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
        <label for="exampleInputEmail1">Email Adhar</label>
        <input name="adhar" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter adhar">
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button name="submit" type="submit" class="btn btn-primary">Login</button>
</form>

<?php include("./footer.php") ?>