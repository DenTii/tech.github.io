<?php
include "config.php";

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    if (isset($_GET['delete'])) {
        $id = $_GET['id'] ?? null;
        $query = mysqli_query($conn, "delete from dimen where id='$id'");
        if ($query) {
            header("location:dimendexadmin_sok.php");
            die();
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include "head.php"; ?>

    <body style="background-image: url('../dimension_sokkong/back.jpg');" class="mb-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col">

                </div>
            </div>
            <div class="row">
                <div class="col"><a class="btn btn-success mt-4 mb-3" href="adduser_sok.php"><i class="bi bi-person-fill-add"></i> Manage User</a></div>
                <div class="col">
                    <div class="h1 mt-3 mb-3 text-center fontkh"><b><u>ព័ត៌មានបច្ចេកទេសទូទៅ</u></b></div>
                </div>
                <div class="col d-grid gap-2 d-md-flex justify-content-md-end mt-4 mb-3 mx-5">
                    <h3 class="border border-5 bg-light p-2" style="border-radius: 10px;">
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <b>CREATE BY: </b> &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<i class="bi bi-person-fill-add"></i>
                                <b class="text-success" style="font-size: 20px;">DENNEW PROM </b>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="log.php"onclick="return confirm('Are you sure to leave?')">Log Out</a></li>
                            </ul>
                        </div>
                    </h3>
                </div>
            </div>
            <div class="row bg-secondary fontkh mb-4 text-white text-center border rounded p-1">
                <div class="col">
                    <h4><a href="../dimension_sokkong/dimendexadmin_sok.php" class="text-white">Dimension</a></h4>
                </div>
                <div class="col">
                    <h4><a href="../dimension_sokkong/dimendexadmin_sok_kilo.php" class="text-white">គណនាទម្ងន់យាន</a></h4>
                </div>
                <div class="col">
                    <h4><a href="../dimension_sokkong/dimendexadmin_sok_m.php" class="text-white">គណនាខ្នាត</a></h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="addadmin_sok.php" class="btn btn-success fontkh"><i class="bi bi-database-fill-add"></i> បញ្ចូលទិន្ន័យ</a>
                </div>

                <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                    <form action="" method="GET" id="form">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" required placeholder="search..." name="search" value="<?php if (isset($_GET['search'])) {echo $_GET['search'];} ?>">
                                    <label for="floatingInput">Search...</label>
                                </div>
                            </div>
                            <div class="col fontkh"><button class="btn btn-light border border-3 shadow p-3 mb-1 bg-body rounded" type="submit" id="submit"><i class="bi bi-search"></i> ស្វែងរក</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row fontkh">
                <div class="col" style="width:100%; max-height: 600px; overflow-y:scroll;">
                    <table class="table mt-3 bg-light table-hover table table-bordered border-secondary border border-5">
                        <thead>
                            <tr>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">#</th>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">ម៉ាករថយន្ត</th>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">ទំហំស៊ីឡាំង</th>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">ចំនួនស៊ីឡាំង</th>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">កម្លាំងសេះ</th>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">បណ្តោយ</th>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">ទទឹង</th>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">កម្ពស់</th>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">ទម្ងន់យាន្ត</th>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">ទម្ងន់ផ្ទុក</th>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">ចំនួនកៅអី</th>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">ចំនួនភ្លៅ</th>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">ឆ្នាំផលិត</th>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">ឥន្ទនៈ</th>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">លុប</th>
                                <th class="bg-secondary border border-light text-light" style="position: sticky; top: 0px;" scope="col">កែប្រែ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            include "config.php";
                            if (isset($_GET['search'])) {
                                $filtervalue = $_GET['search'];
                                $query = "SELECT * FROM dimen WHERE CONCAT(mark) LIKE '%$filtervalue%' ";
                                $query_run = mysqli_query($conn, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                ?>
                                        <tr style="font-size: 14px;">
                                            <td><?php echo $no ?></td>
                                            <td><strong><?php echo $row['mark'] ?></strong></td>
                                            <td><?php echo $row['cc'] ?>&nbsp;&nbsp;cc</td>
                                            <td><?php echo $row['nc'] ?></td>
                                            <td><?php echo $row['hp'] ?>&nbsp;&nbsp;hp</td>
                                            <td><?php echo $row['length'] ?>&nbsp;m</td>
                                            <td><?php echo $row['width'] ?>&nbsp;m</td>
                                            <td><?php echo $row['height'] ?>&nbsp;m</td>
                                            <td><?php echo $row['kerb'] ?>&nbsp;Kg</td>
                                            <td><?php echo $row['load'] ?>&nbsp;Kg</td>
                                            <td><?php echo $row['seat'] ?></td>
                                            <td><?php echo $row['ax'] ?></td>
                                            <td class="text-danger"><strong><?php echo $row['year'] ?></strong></td>
                                            <td><strong><?php echo $row['fualt'] ?></strong></td>
                                            <td>
                                            <a href="?delete&id=<?php echo $row['id'] ?>" onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនឬទេ?')" class="btn btn-danger fontkh"><i class="bi bi-trash"></i>លុប</a>
                                        </td>
                                        <td>
                                            <?php
                                            echo "<a class='btn btn-primary fontkh' href='edit_sok.php?id=" . $row['id'] . "'><i class='bi bi-pencil-square'></i> Edit</a>";
                                            ?>
                                        </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                } else {
                                    ?>
                                    <tr class="text-center text-primary">
                                        <td colspan="16"><span style="font-size: 55px; font-weight:bold;"><i class="bi bi-search"></i></span> <br><span style="font-size: 20px; font-weight:bold;">រកមិនឃើញ</span></td>
                                    </tr>
                        <?php
                                }
                            }




                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else {
    header("location:log.php");
    exit();
}
?>