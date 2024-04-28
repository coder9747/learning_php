<?php include("./header.php")  ?>

<form class="container">
    <div class="form-group mb-3">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
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
    <button type="submit" class="btn btn-primary">Login</button>
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