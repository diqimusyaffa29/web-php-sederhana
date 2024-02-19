<?php
    include "service/database.php";
    $register_message = "";
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

        $result = $db->query($sql);
        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            
            header("location: dashboard.php");
        } else {
            $register_message = "Login Gagal, Silahkan Coba lagi";
        }
    }



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include "layout/header.html" ?>
    <h3>MASUK AKUN</h3>
    <i><?= $register_message ?></i>
    <form action="login.php" method="post">
        <input type="text" placeholder="Username" name="username">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" name="login">Login Sekarang</button>
    </form>
    <?php include "layout/footer.html" ?>
</body>

</html>