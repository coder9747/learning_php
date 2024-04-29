<?php include("./header.php")  ?>


<?php

if (isset($_POST["submit"])) {
    include("./connect.php");
    $type = $_POST["type"];
    $adhar = $_POST["adhar"];
    $sql = "select * from user where adhar = '$adhar'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $num = mysqli_num_rows($result);
    if ($num == 0) {
        if ($type == "voter") {
            $adhar = $_POST["adhar"];
            $password = $_POST["password"]; 
            $sql = "insert into user (adhar,type,password) values ('$adhar','$type','$password')";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if ($result) {
                header("location:./signup.php");
            } else {
                echo "user not exists";
            }
        } else {
            print_r($_FILES["photo"]);
            $file_name = $_FILES["photo"]["name"];
            $adhar = $_POST["adhar"];
            $password = $_POST["password"];
            $allowed_extension = ['jpg', 'jpeg', 'png', 'gif'];
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
            if (in_array($file_extension, $allowed_extension)) {
                $dir = "image/";
                $target_file = $dir . $file_name;
                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                    $sql = "insert into user (adhar,type,password,photo) values ('$adhar','$type','$password','$target_file')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo "account created succes";
                    } else {
                        echo "error in creating account";
                    }
                } else {
                    echo "error in uploading file";
                }
            } else {
                echo "only ";
                foreach ($allowed_extension as $key) {
                    echo $key . " ";
                }
                echo " is allowed";
            }
        }
    } else {
        echo "adhar  already exists ";
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
    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Category</label>
        <select name="type" class="form-select" id="inputGroupSelect01">
            <option selected>Choose...</option>
            <option value="voter">Voter</option>
            <option value="party">Party</option>
        </select>
    </div>
    <div class="mb-3 form-group select-val" class="">

    </div>
    <button name="submit" type="submit" class="btn btn-primary">Sign Up</button>
</form>
<script>
    const select = document.querySelector("select");
    const selectDiv = document.querySelector(".select-val");
    select.addEventListener("change", (e) => {
        const type = e.target.value;
        if (type == "party") {
            selectDiv.innerHTML = `<label for="formFile" class="form-label">Party Picture</label>
        <input name="photo" class="form-control" type="file" id="formFile">`;
            return;
        }
        selectDiv.innerHTML = "";
    })
</script>

<?php include("./footer.php")  ?>