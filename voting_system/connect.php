<?php


define("host","localhost");
define("user","root");
define("password","");
define("db_name","voting_system");

$conn = mysqli_connect(host,user,password,db_name) or die(mysqli_error($conn));

