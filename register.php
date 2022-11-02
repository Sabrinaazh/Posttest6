<?php
    require "koneksi.php";

    if(isset($_POST["daftar"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["Cpassword"];

        if($password === $cpassword)
        {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $result = mysqli_query($conn, "SELECT username FROM akun WHERE username = '$username'");

            if(mysqli_fetch_assoc(($result)))
            {
                echo 
                "<script>
                    alert('username telah digunakan!');
                    document.location.href = 'register.php';
                </script>";
            }

            else
            {
                $sql = "INSERT INTO akun VALUES('', '$username', '$password')";
                $result = mysqli_query($conn, $sql);

                if(mysqli_affected_rows($conn) > 0)
                {
                    echo 
                    "<script>
                        alert('Registrasi berhasil');
                        document.location.href='login.php';
                    </script>";
                }

                else
                {
                    echo
                    "<script>
                        alert('Registrasi Gagal!');
                        document.location.href = 'register.php';
                    </script>";
                }
            }
        }
        else
        {
            echo "<script>
            alert('kedua passowrd tidak sama');
            document.location.href = 'register.php';
            </script>";
        }
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

    <div class="contain-login">

        
        <div class="login-form">
        <h2><i>Sociolla</i></h2>
            <form action="" method="post">
                <label for="">Username</label> <br><br>
                <input type="text" name="username" placeholder="Username..." required> <br><br>
                <label for="">Password</label><br><br>
                <input type="password" name="password" placeholder="Password..." required><br><br>
                <label for="">Konfirmasi Password</label><br><br>
                <input type="password" name="Cpassword" placeholder="Konfirmasi Password..." required><br><br>

                <button class="button-login" name="daftar" type="submit">DAFTAR</button><br><br>
            </form>
            <div class="daftar">
                <a href="login.php">Klik untuk Kembali</a>
            </div>
        </div>

       
    </div>
    
</body>
</html>