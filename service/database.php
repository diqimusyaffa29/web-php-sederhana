<?php
$hostname = "localhost";
$username = "root";
$port = 3307; //ini karena melakukan perubahan port di xampp
$password = "";
$database = "buku_tamu";

$db = mysqli_connect($hostname, $username, $password, $database, $port);

if ($db->connect_error) {
    echo "Koneksi Gagal";
    die();
}