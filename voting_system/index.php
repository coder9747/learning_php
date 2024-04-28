<?php include("./header.php")  ?>

<?php



?>

<div class="row">
    <?php
    include("./connect.php");
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
                </div>
            </div>
    <?php }
    } ?>
</div>



<?php include("./footer.php")  ?>