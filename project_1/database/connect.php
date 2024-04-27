<?php

define("HOST_NAME", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE_NAME", "note");

//connecting to database
$conn = mysqli_connect(HOST_NAME, USER, PASSWORD, DATABASE_NAME) or die(mysqli_error($conn));
