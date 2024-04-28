<?php
include("../database/connect.php");

$id = $_GET["note_id"];
$sql = "delete from notes where id = '$id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("location:../index.php");
} else {
    echo "hey2";
}
