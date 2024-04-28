<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    include("../database/connect.php");
    $note = $_POST["note"];
    $userId = $_SESSION["id"];
    $sql = "insert into notes (text,user_id) value('$note','$userId')";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if($result)
    {
        header("location:../index.php");
    }
    else
    {
        echo "invalid";
    }

} else {
    header("location:../index.php");
}
