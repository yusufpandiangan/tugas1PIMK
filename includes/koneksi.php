<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'proweb';

$koneksi = mysqli_connect($host, $user, $pass, $database);

if($koneksi->connect_error){
    die("Koneksi gagal ". $koneksi->connect_error);
}
?>