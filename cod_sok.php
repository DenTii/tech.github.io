<?php
session_start();
include "config.php";


if (isset($_POST['username']) && isset($_POST['pwd'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlentities($data);
        return $data;
    }
    $uname = validate($_POST['username']);
    $pwd = validate($_POST['pwd']);

    if (empty($uname)) {
        header("location:log.php?error=Username is required");
        exit();
    } else if (empty($pwd)) {
        header("location:log.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE username='$uname' AND pwd='$pwd'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['pwd'] === $pwd) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['pwd'] = $row['pwd'];
                $_SESSION['id'] = $row['id'];
                header("location:dimendexadmin_sok.php");
                exit();
            } else {
                header("location:log.php?error=Incorect username or password");
                exit();
            }
        } else {
            header("location:log.php?error=Incorect username or password");
            exit();
        }
    }
} else {
    header("location:log.php");
    exit();
}
