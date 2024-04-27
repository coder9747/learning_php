<?php
define("HOST_NAME", "localhost");
define("USER_NAME", "root");
define("PASSWORD", "");
define("DATABASE_NAME", "sign_up_form");


$cnn = mysqli_connect(HOST_NAME, USER_NAME, PASSWORD, DATABASE_NAME);
if (!$cnn) {
    die(mysqli_error($cnn));
}
