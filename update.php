<?php

    require "koneksi.php";

    $id = $_GET["id"];
    $read_sql = "SELECT * FROM merek WHERE id = $id";
    $result = mysqli_query($conn, $read_sql);

    $merek = [];

    while($row = mysqli_fetch_assoc($result))
    {
        $merek[] = $row;
    }

    $merek = $merek[0];

    if(isset($_POST["update"]))
    {
        $gambar = htmlspecialchars($_FILES["gambar"]["name"]);
        $tmp = htmlspecialchars($_FILES["gambar"]["tmp_name"]);
        $nama_produk = htmlspecialchars($_POST["nama_produk"]);
        $harga = htmlspecialchars($_POST["harga"]);
        $alamat = htmlspecialchars($_POST["alamat"]);

        move_uploaded_file($tmp, "img/".$gambar);

        $sql = "UPDATE merek SET gambar = '$gambar', nama_produk = '$nama_produk', harga = '$harga', alamat = '$alamat' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo "
            <script>
            alert('Data Berhasil Di Edit');
            document.location.href = 'daftar.php'
            </script>";
        }

        else
        {
            echo "
            <script>
            alert('Data Gagal Di Edit');
            document.location.href = 'update.php?id=$id'
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
    font-family: Arial, Helvetica, sans-serif;
    padding: 0;
    margin: 0;
}



.header
{
    width: 100%;
    align-items: center;
    display: flex;
    flex-direction: row;
    padding: 15px;
    background-color: rgb(250, 204, 212);
    justify-content: space-between;
    position: fixed;
    top: 0;

}

.headerDark
{
    width: 100%;
    align-items: center;
    display: flex;
    flex-direction: row;
    padding: 15px;
    background-color: black;
    justify-content: space-between;
    position: fixed;
    top: 0;

}

.text
{
    text-align: center;
    font-size: 30px;
}

.namaweb
{
    align-items: center;
    display: flex;
    flex-direction: row;
    font-family: 'Times New Roman', Times, serif;
    
}

.judul1
{
    color:white;
    font-weight: 300;
    font-size: 50px;
}

.judul2
{
    color: white;
    font-weight: 300;
    font-size: 50px;
}

.navi
{
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.navi > li
{
    list-style-type: none;
    padding: 12px;
}

.konten
{
    background-color: white;
    color: black;
    margin-top: 101px;
}


.dark
{
    background-color: rgb(53, 53, 53);
    color: white;
    margin-top: 101px;
}

.navi
{
    margin: 20px;
}

.navi > li > a
{
    text-decoration: none;
    color: white;
}

.navi > li > a:hover
{
    color: crimson;
    transition: all .2s ease-in-out;
}

.adds
{
    align-items: center;
}


.adds
{

   background-color: orange;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.iklan > img
{
    
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.merk
{
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.merk > div
{

    margin: 10px;
    padding: 20px;
}

footer  
{
    background-color: rgb(250, 204, 212);

}

.nama
{
    text-align: center;
    padding: 20px;
    font-weight: bold;
    color: white;
}

.profile
{
    display: flex;
    align-items: center;
}


.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }
  
  .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
  }
  
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  input:checked + .slider {
    background-color: #000000;
  }
  
  input:focus + .slider {
    box-shadow: 0 0 1px rgb(0, 0, 0);
  }
  
  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }
  
  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }
  
  .slider.round:before {
    border-radius: 50%;
  }

  .inputData
  {
    margin-top: 200px;
    margin-left: 600px;
    margin-bottom: 200px;
    padding: 20px;
    width: 270px;
    background-color: #FAFAFA;
  }

  .inputData input
  {
    width: 250px;
    height: 30px;
  }

  .btn
  {
    width: 257px;
    height: 30px;
    background-color: #F9D1D1;
    border: none;
  }

  .files
  {
    background-color: #FFFFFF;
  }
    </style>
</head>
<body>
    <div class="header" id="kepala">
        <div class="namaweb">
            <div class="judul1">soci</div>
            <div class="judul2">o<i>ll</i>a</div>
        </div>
        

        <ul class="navi">
            <li><a href="index.php">HOME</a></li>
            <li><a href="aboutme.php">ABOUT ME</a></li>
            <li><a href="tambah.php">TAMBAH</a></li>
            <li><a href="daftar.php">DAFTAR SKINCARE</a></li>
            <label class="switch">
                <input type="checkbox" id="cb" value="true" onchange="check()">
                <span class="slider round"></span>
            </label>
            
        </ul>

    </div>

    <div class="konten" id="container">
        
    <div class="inputData">
        <div class="text"><h4>EDIT DATA</h4></div>

        <form action="" method="post" enctype="multipart/form-data">

            <input type="file" name="gambar" id="" class="files">
            <br>
            <p>Nama Produk</p>
            <input type="text" name="nama_produk" id="" placeholder="masukan nama skincare...">
            <br>
            <p>Harga</p>
            <input type="text" name="harga" id="" placeholder="masukan harga...">
            <br>
            <p>Alamat</p>
            <input type="text" name="alamat" id="" placeholder="masukan alamat...">
            <br> <br>
            <button class="btn" name="update" type="submit">UPDATE</button>

        </form>

    </div>


    <footer>
        <p class="nama">Sabrina Nur Az-zahra</p>
    </footer>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>