<?php
$action = $_GET['action'];

require_once "koneksi.php";
if($action == "update-rule"){

    $id = $_GET['id'];
    $temperatur = $_POST['temperatur'];
    $kelembaban = $_POST['kelembaban'];
    $angin = $_POST['angin'];
    $hasil = $_POST['hasil'];

    $query = mysqli_query($con, "UPDATE `rule` SET `temperatur`='$temperatur',`kelembaban`='$kelembaban',`angin`='$angin',`hasil`='$hasil' WHERE `id`='$id'");
    if($query){
        echo "<script>alert('Update Rule Berhasil!'); window.location ='data_rule.php' </script>";
    }else{
        echo mysqli_error($con);
    }
}elseif($action == "save-rule"){
    $temperatur = $_POST['temperatur'];
    $kelembaban = $_POST['kelembaban'];
    $angin = $_POST['angin'];
    $hasil = $_POST['hasil'];

    $query = mysqli_query($con, "INSERT INTO `rule`(`temperatur`, `kelembaban`, `angin`, `hasil`) VALUES ('$temperatur','$kelembaban','$angin','$hasil')");
    if($query){
        echo "<script>alert('Tambah Rule Berhasil!'); window.location ='data_rule.php' </script>";
    }else{
        echo mysqli_error($con);
    }

}elseif($action == "delete-rule"){
    $id = $_GET['id'];
    $query = mysqli_query($con, "DELETE FROM `rule` WHERE `id`='$id'");
    if($query){
        echo "<script>alert('Delete Rule Berhasil!'); window.location ='data_rule.php' </script>";
    }else{
        echo mysqli_error($con);
    }

}elseif($action == "delete-data-hujan"){
    $id = $_GET['id'];
    $query = mysqli_query($con, "DELETE FROM `data` WHERE `id`='$id'");
    if($query){
        echo "<script>alert('Delete Data Curah Hujan Berhasil!'); window.location ='data_hujan.php' </script>";
    }else{
        echo mysqli_error($con);
    }

}
?>