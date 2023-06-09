<?php

session_start();

if ($_SESSION['level'] == '') {
    header("location:../../index.php?pesan=belumlogin");
}

include '../config/dbConnect.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$data = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$check = mysqli_num_rows($data);

if ($check <= 0) {
    header("location:../index.php?pesan=gagal");
}

$data = mysqli_fetch_assoc($data);

if (!$data['level'] !== '1' && !$data['level'] !== 0) {
    header("location:../index.php?pesan=gagal");
}

if ($data['level'] == '1') {
    $_SESSION['username '] = $username;
    $_SESSION['level'] = 1;
    header("location:../view/admin/index.php");
}

if ($data['level'] == '0') {
    $_SESSION['username'] = $username;
    $_SESSION['level'] = "0";
    header("location:../view/user/index.php");
}
