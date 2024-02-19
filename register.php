<?php
include "service/database.php"; //Koneksi db
session_start();

$register_message = "";

if (isset($_SESSION["is_login"])) {
    header("location: dashboard.php");
}

if (isset($_POST["register"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash_password = hash("sha256", $password);

    try {
        if (empty($username) || empty($hash_password)) {
            $register_message = "Username and Password must not empty";
        } else {
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash_password')";

            if ($db->query($sql)) {
                $register_message = "Register Account Success, Please Login";
            } else {
                $register_message = "Register Accound Failed, Please Try Again";
            }
        }
    } catch (mysqli_sql_exception $e) {
        $register_message = $e->getMessage(); //if duplicate data
    }

    $db->close();
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
    <i><?= $register_message ?></i>
    <form action="register.php" method="post">
        <input type="text" placeholder="Username" name="username">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" name="register">Daftar Sekarang</button>
    </form>
    <?php include "layout/footer.html" ?>
</body>

</html>