<?php
class simpan{
    function save($data,$status){
        require_once "koneksi.php";
        global $con;

        $wilayah = mysqli_real_escape_string($con, $data['wilayah']);
        $temperatur = mysqli_real_escape_string($con, $data['derajat_temperatur']);
        $kelembaban = mysqli_real_escape_string($con, $data['persen_kelembaban']);
        $angin = mysqli_real_escape_string($con, $data['kecepatan_angin']);

        $query = mysqli_query($con, "INSERT INTO `data`(`id`,`wilayah`,`temperatur`,`kelembaban`,`angin`,`status`) VALUES ('NULL','$wilayah','$temperatur','$kelembaban','$angin','$status')");
        return $query;
    }

    function update($data,$status,$id){
        require_once "koneksi.php";
        global $con;

        $wilayah = mysqli_real_escape_string($con, $data['wilayah']);
        $temperatur = mysqli_real_escape_string($con, $data['derajat_temperatur']);
        $kelembaban = mysqli_real_escape_string($con, $data['persen_kelembaban']);
        $angin = mysqli_real_escape_string($con, $data['kecepatan_angin']);

        $query = mysqli_query($con, "UPDATE `data` SET `wilayah`='$wilayah',`temperatur`='$temperatur',`kelembaban`='$kelembaban',`angin`='$angin',`status`='$status' WHERE `id`='$id'");
        return $query;
    }
}
?>