<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "../../database/database.php";

$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
$nis = $data->nis;
$nama_lengkap = $data->nama_lengkap;
$alamat = $data->alamat;
$kelas_id = $data->kelas_id;

$hasil["success"] = false;
$hasil["data"] = array();

$insert_sql = "INSERT INTO siswa VALUES ('$id','$nis','$nama_lengkap','$alamat','$kelas_id')";
$result = mysqli_query($connection, $insert_sql);
if ($result) {
    $hasil["success"] = true;
    $hasil["data"] = $data;
}

echo json_encode($hasil);
