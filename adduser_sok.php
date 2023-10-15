<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    include "config.php";
    $edit_state = false;

    if (isset($_POST['save'])) {
        $uname = $_POST['uname'];
        $pwd = ($_POST['pwd']);
        $st = ($_POST['st']);
        $img1 = $_FILES['pic1']['name'];

        if ($img1 != "") {
            $ext = pathinfo($img1, PATHINFO_EXTENSION);
            $img1 = md5(uniqid()) . "." . $ext;
            move_uploaded_file($_FILES['pic1']['tmp_name'], "upload/" . $img1);
        } else {
            $img1 = "";
        }

        $sql = "insert into user(username,pwd,status,pic1) values('$uname','$pwd','$st','$img1')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script>alert('Add data success')</script>";
        }
    }
?>
    <?php
    if (isset($_GET['delete'])) {
        $id = $_GET['id'] ?? null;
        $photo = mysqli_query($conn, "select * from user where id='$id'");
        $prow = mysqli_fetch_assoc($photo);
        unlink("upload/" . $prow['pic1']);
        $query = mysqli_query($conn, "delete from user where id='$id'");
        if ($query) {
            header("location:adduser_sok.php");
            die();
        }
    }
    if (isset($_GET['edit'])) {
        $edit_state = true;
        $id = $_GET['id'] ?? null;
        $query = mysqli_query($conn, "select * from user where id='$id'");
        while ($row = mysqli_fetch_assoc($query)) {
            $Vid = $row['id'];
            $Vname = $row['username'];
            $Vpwd = $row['pwd'];
            $Vst = $row['status'];
            $Vpic = $row['pic1'];
        }
    } else {
        $Vid = "";
        $Vname = "";
        $Vpwd = "";
        $Vst = "";
        $Vpic = "";
    }

    if (isset($_POST['btnedit'])) {
        $tid = $_POST['txtid'];
        $tname = $_POST['uname'];
        $tpwd = $_POST['pwd'];
        $tst = $_POST['st'];
        $timg1 = $_POST['txtpic'];

        if ($_FILES['pic1']['name'] != "") {
            list($name, $ext) = explode(".", $_FILES['pic1']['name']);
            $timg1 = md5(uniqid()) . "." . $ext;
            unlink("upload/" . $_POST['txtpic']);
            move_uploaded_file($_FILES['pic1']['tmp_name'], "upload/" . $timg1);
        } else {
            $timg1 = $_POST['txtpic'];
        }
        $sql = "update user set username='" . $tname . "',pwd='" . $tpwd . "' ,status='" . $tst . "' ,pic1='" . $timg1 . "' where id='" . $tid . "'";

        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<div class='alert alert-success' role='alert'>
        កែប្រែជោគជ័យ
      </div>";
            header("location:adduser_sok.php");
        } else {
            echo "<div class='alert alert-danger fontkh4' role='alert'>
        <i class='bi bi-exclamation-circle-fill'></i> កែប្រែមិនជោគជ័យ!
      </div>";
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <?php include "head.php"; ?>

    <body style="background-image: url('../dimension_sokkong/back.jpg');">
        <div class="container fontkh4 bg-white">

            <div class="row bg-secondary p-3 mb-2 text-white border rounded">
                <div class="col-7">
                    <div class="row">
                        <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                            <h4> Total User =</h4>
                        </div>
                        <div class="col">
                            <?php
                            $query = "SELECT id FROM user ORDER BY id";
                            $query_run = mysqli_query($conn, $query);

                            $row = mysqli_num_rows($query_run);
                            echo  '<h4>' . $row . '</h4>';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-8">
                                <input class="form-control" name="search" placeholder="Search">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <a href="dimendexadmin_sok.php">
                        <button type="button" class="btn btn-outline-danger fontkh4" style="font-size: 14px;"><i class="bi bi-arrow-left-circle"></i> ត្រឡប់</button>
                    </a>
                </div>
                <div class="col-sm-8">
                    <h3 class="bg-danger text-white p-4 rounded">Add User</h3>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $Vid ?>" name="txtid">
                        <input type="hidden" value="<?php echo $Vpic ?>" name="txtpic">
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Username:</label>
                            <input type="text" value="<?php echo $Vname ?>" class="form-control" required id="uname" placeholder="Enter username" name="uname">
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Password:</label>
                            <input type="password" value="<?php echo $Vpwd ?>" class="form-control" required id="pwd" placeholder="Enter password" name="pwd">
                        </div>

                        <div class="mb-3">
                            <label for="st" class="form-label">Status:</label>
                            <input type="text" value="<?php echo $Vst ?>" class="form-control" required id="st" placeholder="Enter status" name="st">
                        </div>

                        <div class="mb-3">
                            <label for="img" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="img" placeholder="Enter password" name="pic1">
                        </div>

                        <div>
                            <?php if ($edit_state == false) : ?>
                                <button class="btn btn-primary p-2" type="submit" name="save">Save</button>
                            <?php else : ?>
                                <button class="btn btn-warning p-2" type="submit" name="btnedit">Edit</button>
                            <?php endif ?>
                            <!-- <button class="btn btn-primary p-2" type="submit" name="save">រក្សាទុក</button> -->
                            <a href="adduser_sok.php">
                                <button type="button" class="btn btn-danger p-2 fontkh4" style="font-size: 14px;">Cencal</button>
                            </a>

                        </div>
                    </form>
                </div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8 cart-body">
                    <table class="table border rounded-3 bg-light">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Status</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        $sql = "select * from user";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['pwd'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <td>
                                    <img src="<?php echo "upload/" . $row['pic1']; ?>" width="100px">
                                </td>
                                <td>
                                    <a href="?delete&id=<?php echo $row['id'] ?>" onclick="return confirm('Do you want to delete?')" class="btn btn-danger fontkh"><i class="bi bi-trash"></i>Delete</a>
                                    <a href="?edit&id=<?php echo $row['id']; ?>" class="btn btn-success fontkh">Update</a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </table>

                </div>
                <div class="col-2"></div>
            </div>

        </div>
    </body>

    </html>
<?php
} else {
    header("location:login.php");
}
?>