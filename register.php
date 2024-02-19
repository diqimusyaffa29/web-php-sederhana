<?php
include "service/database.php"; //Koneksi db

$register_message = "";

if (isset($_POST["register"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if($db->query($sql)){
        $register_message = "Daftar Akun berhasil, Silahkan Login";
    }else{
        $register_message = "Daftar Akun Gagal, Silahkan Coba Lagi";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <?php include "layout/header.html" ?>
    <h3>DAFTAR AKUN</h3>
    <i><?=$register_message?></i>
    <form action="register.php" method="post">
        <input type="text" placeholder="Username" name="username">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" name="register">Daftar Sekarang</button>
    </form>
    <?php include "layout/footer.html" ?>
</body>

</html>