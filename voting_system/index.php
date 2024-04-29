<?php include("./header.php")  ?>

<?php
include("./connect.php");
session_start();
$voted = false;
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "select * from user where id = '$id'");
    $row = mysqli_fetch_assoc($result);
    $voted = $row["is_voted"]=="1"?true:false;
}



?>

<div class="row">
    <?php
    $sql = "select * from user where type = 'party'";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <div class="card" style="width: 18rem;">
                <img src=<?= $row["photo"] ?> class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <?php if(!$voted){ ?>
                    <a href="handle_vote.php?party_id=<?= $row["id"] ?>">Vote</a>
                    <?php }else { ?>
                    <a <?php echo $voted?"disabled":null ?>>voted</a>
                    <?php } ?>
                </div>
            </div>
    <?php }
    } ?>
    <?php if(isset($_SESSION["id"])){ ?>
    <a href="./handle_logout.php">Logout</a>
    <?php }else { ?>
        <a href="./signup.php">login</a>
    <?php } ?>
</div>



<?php include("./footer.php")  ?>