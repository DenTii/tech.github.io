<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body style="background-color: #45A8EA;">
    <div class="container-xxl">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 p-4 shadow-lg p-3 mb-5 bg-body fontkh4" style="background-color: #ECF0F1; border-radius:40px; margin-top:15%">
                <h1 class="mb-4 text-center">Log In</h1>
                <form action="cod_sok.php" method="post">
                    <?php if(isset($_GET['error'])){?>
                        <p class="error alert alert-danger" role="alert"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <div class="form-group mb-3">
                        <label class="mb-1 sm mx-1">Username : <i class="bi bi-person-fill"></i>    </label>
                        <input class="form-control" placeholder="username" type="text" name="username">
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-1 sm-1 mx-1">Password :</label>
                        <input class="form-control" placeholder="Password" type="password" name="pwd">
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Remember me
                        </label>
                    </div>
                    <div>
                        <button class="btn btn-primary"  style="border-radius: 10px;" name="btnlog" type="submit">
                            Login <i class="bi bi-box-arrow-in-left"></i>
                        </button>
                        <button class="btn btn-danger" style="border-radius: 10px;" type="button" name="btnclear">
                            Cancel <i class="bi bi-x-square"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>