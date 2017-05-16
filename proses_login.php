<?php
$action = $_GET['action'];

if($action == "register"){
    require_once 'koneksi.php';

    $username = mysqli_real_escape_string($con, $_POST['register-form-username']);
    $fullname = mysqli_real_escape_string($con, $_POST['register-form-name']);
    $email = mysqli_real_escape_string($con, $_POST['register-form-email']);
    $password = mysqli_real_escape_string($con, $_POST['register-form-password']);
    $status = '1';

    $query = mysqli_query($con, "INSERT INTO `user`(`username`, `fullname`, `email`, `password`, `status`) VALUES ('$username', '$fullname', '$email', '$password', '$status')");

    if ($query) {
        echo "<script>alert('Anda berhasil Registrasi'); window.location ='login.php' </script>";
    } else {
        echo "<script>alert('Anda gagal Registrasi'); window.location ='login.php' </script>";
    }

}elseif($action == "login"){
    include 'koneksi.php';

    $username = mysqli_real_escape_string($con, $_POST['login-form-username']);
    $password = mysqli_real_escape_string($con, $_POST['login-form-password']);

    $query = mysqli_query($con, "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'");
    $result = mysqli_fetch_array($query);

    $status = $result['status'];
    $id = $result['id'];

    $a = mysqli_num_rows($query);

    if($a == 1) {

        if(!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['status'] = $status;
        header('location: index.php');

    } else {
        echo mysqli_error($con);
        echo "<script>alert('Gagal Login'); window.location ='login.php' </script>";session_start();
    }
}elseif($action == "logout"){
    if(!isset($_SESSION)) {
        session_start();
    }
    session_destroy();
    echo "<script>alert('Logout Berhasil!'); window.location ='index.php' </script>";
}
?>