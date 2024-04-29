<?php

session_start();
$id = $_SESSION["id"];
$party_id = $_GET["party_id"];

include("./connect.php");
$sql = "select * from user where id = '$party_id'";

$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $new_count = $row["count"] + 1;
    $sql = "update user set count = '$new_count' where id = '$party_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        //now update  user is_voted field so  he or she cannot vote again
        $sql = "update user set is_voted = 1 where id = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            echo "user voted succes";
            header("location:index.php");
        }
    } else {
        echo "faild to vote";
    }
} else {
    echo 'party not found with this id';
}
