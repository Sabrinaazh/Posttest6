<?php
session_start();
require "koneksi.php";

if(isset($_POST["login"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1)
    {
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row["password"]))
        {
            $_SESSION["login"] = true;
            header("Location: daftar.php");
            exit;
        }
    }
    $error = true;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        body
        {
            margin: 0;
            background-color: #FFE8FA;
        }

        .contain-login
        {
            height: 100%;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .login-form
        {
            padding: 20px;
            padding-top: 40px;
            margin-left: 500px;
            margin-top: 120px;
            width: 320px;
            height: 380px;
            border-radius: 20px ;
            background-color: #FAFAFA;
        }

        

        .login-form > form > input
        {
            width: 300px;
            border-style: none;
            border-bottom-style: solid;
            border-color: black;
            height: 25px;
        }
        
        .button-login
        {
            cursor: pointer;
            border: none;
            width: 300px;
            height: 30px;
            border-radius: 8px;
            color: white;
            background-color: crimson;
        }
    </style>
</head>
<body>
    <?php if(isset($error))
    {
        echo "<p style='color: red;'><i>Error : Username atau password salah!</i></p>";
    } 
    
    ?>

    <div class="contain-login">

        
        <div class="login-form">
        <h2><i>Sociolla</i></h2>
            <form action="" method="post">
                <label for="">Username</label> <br><br>
                <input type="text" name="username" placeholder="Username..." required> <br><br>
                <label for="">Password</label><br><br>
                <input type="password" name="password" placeholder="Password..." required><br><br>
                <label for="">Konfirmasi Password</label><br><br>

                <button class="button-login" name="login" type="submit">LOGIN</button><br><br>
            </form>
            <div class="daftar">
                <a href="register.php">belum punya akun?: Daftar Disini</a>
            </div>

            <?php if(isset($error)){
                echo "<p style='color: red;'>ERROR: Username/password salah!</p>";
            } ?>
        </div>

       
    </div>
    
</body>
</html>