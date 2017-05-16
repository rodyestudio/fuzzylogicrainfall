<?php


class perhitungan
{
    function hitung($nilai_temperatur, $nilai_kelembaban, $nilai_angin)
    {
        require_once "koneksi.php";
        global $con;

        $sql = mysqli_query($con, "SELECT MIN(temperatur) as min_temperatur, MAX(temperatur) as max_temperatur, 
AVG(temperatur) as rata_temperatur, MIN(kelembaban) as min_kelembaban, MAX(kelembaban) as max_kelembaban, AVG(kelembaban) as rata_kelembaban, 
MIN(angin) as min_angin, MAX(angin) as max_angin, AVG(angin) as rata_angin FROM `data`") or die ("Gagal " . mysqli_error($con));
        if ($tampil = mysqli_fetch_array($sql)) {
            $min_temperatur = $tampil['min_temperatur'];
            $max_temperatur = $tampil['max_temperatur'];
            $rata_temperatur = $tampil['rata_temperatur'];

            $min_kelembaban = $tampil['min_kelembaban'];
            $max_kelembaban = $tampil['max_kelembaban'];
            $rata_kelembaban = $tampil['rata_kelembaban'];

            $min_angin = $tampil['min_angin'];
            $max_angin = $tampil['max_angin'];
            $rata_angin = $tampil['rata_angin'];


        }
        $temperatur['rendah'] = $this->rendah($nilai_temperatur, $min_temperatur, $rata_temperatur);
        $temperatur['sedang'] = $this->sedang($nilai_temperatur, $min_temperatur, $max_temperatur, $rata_temperatur);

        $kelembaban['rendah'] = $this->rendah($nilai_kelembaban, $min_kelembaban, $rata_kelembaban);
        $kelembaban['sedang'] = $this->sedang($nilai_kelembaban, $min_kelembaban, $max_kelembaban, $rata_kelembaban);

        $angin['rendah'] = $this->rendah($nilai_angin, $min_angin, $rata_angin);
        $angin['sedang'] = $this->sedang($nilai_angin, $min_angin, $max_angin, $rata_angin);

        $hasil = array(
            "temperatur" => $temperatur,
            "kelembaban" => $kelembaban,
            "angin" => $angin
        );
        $hasil;
        return $hasil;
    }

    function rendah($nilai, $min_temperatur, $rata_temperatur)
    {
        if ($nilai <= $min_temperatur) {
            return 1;
        } elseif ($min_temperatur <= $nilai && $nilai <= $rata_temperatur) {
            $pembagi = $rata_temperatur - $min_temperatur;
            $hitung = ($rata_temperatur - $nilai) / $pembagi;
            return $hitung;
        } elseif ($nilai >= $rata_temperatur) {
            return 0;
        }
    }

    function sedang($nilai, $min_temperatur, $max_temperatur, $rata_temperatur)
    {
        if ($nilai <= $min_temperatur || $nilai >= $max_temperatur) {
            return 0;
        } elseif ($min_temperatur <= $nilai && $nilai <= $rata_temperatur) {
            $pembagi = $rata_temperatur - $min_temperatur;
            $hitung = ($nilai - $min_temperatur) / $pembagi;
            return $hitung;
        } elseif ($rata_temperatur <= $nilai && $nilai <= $max_temperatur) {
            return 1;
        }
    }
}


?>