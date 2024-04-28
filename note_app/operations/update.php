<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../database/connect.php");
    $newText = $_POST["note"];
    $id = $_GET["note_id"];
    $sql = "update notes set text = '$newText' where id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        header("location:../index.php");
    }
    else{
        echo "cannot update note";
    }






} else {
    $note_id = $_GET["note_id"];

    $note_data;
    include("../database/connect.php");
    $sql = "select * from notes where id = '$note_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>


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

    <form action="" method="post" class="mb-3 container">
        <label for="exampleFormControlTextarea1" class="form-label">Enter Your Note Here</label>
        <textarea  name="note" class="form-control my-2" id="exampleFormControlTextarea1" rows="3"><?= $row['text'] ?></textarea>
        <div class="d-flex justify-content-center align-items-center">
            <button class="">Upate Note</button>
        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>