<?php 
    session_start();
    require "koneksi.php";

    if(!isset($_SESSION["login"]))
    {
        header(("Location: login.php"));
        exit;
    }
    else
    {
        echo "<script>alert('Login Berhasil')</script>";
    }

    if(isset($_GET['search'])){
        $data = $_GET['cari'];
        $result = mysqli_query($conn,"SELECT * FROM merek WHERE nama_produk LIKE '%$data%'");
    }
    else{
        $result = mysqli_query($conn,"SELECT * FROM merek");
    }

    $merek = [];

    while($row = mysqli_fetch_assoc($result))
    {
        $merek[] = $row;
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
    margin-top: 50px;
}


.dark
{
    background-color: rgb(53, 53, 53);
    color: white;
    margin-top: 200px;
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

  .inputData form
  {
    margin-top: 500px;
  }

  .merk2
  {
    margin-top : 40px;
    margin-bottom : 40px;
    width: 400px;
    height: 630px;
    border-radius: 10px;
    margin-left: 150px;
    background-color: #FAFAFA;
    padding: 20px;
    font-size: 26px;
     

  }

  .pf
  {
    font-size: 12px;
    text-align: center;
  }

  .merk2 img
  {
    width: 400px;
    height: 400px;
  }

  .tombolHapus
  {
    width: 100px;
    height: 40px;
    background-color: #e60026;
    border: none;
  }

  .tombolEdit
  {
    border: none;
    width: 100px;
    height: 40px;
    background-color: #ABD5AB;
  }

  .tombolHapus, .tombolEdit
  {
    
    text-color: white;
    color: white;
    border-radius: 8px;
  }

  .konten
  {
    display: flex;
    flex-wrap : wrap;
  }

  .search-bar
  {
    margin-left: 150px;
    width: 600px;
    border-radius: 10px ;
    background-color: #FAFAFA;
    height: 40px;
    padding: 20px;
    margin-top: 200px;
  }

  .search-btn
  {
    width: 50px;
    height: 50px;
    cursor: pointer;
    background-color: crimson;
    border: none;
    color: white;
  }

  .bars
  {
    height: 50px;
    width: 500px;
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
            <li><a href="logout.php">LOGOUT</a></li>
            <label class="switch">
                <input type="checkbox" id="cb" value="true" onchange="check()">
                <span class="slider round"></span>
            </label>
            
        </ul>

    </div>

    <div class="search-bar">
        <form action="" method="get">
            <input type="text" name="cari" id="cari" placeholder="Cari Produk" class="bars">
            <button name="search" class="search-btn">CARI</button>
        </form>
    </div>  

    <div class="konten" id="container">
        
    <?php $i = 1; foreach($merek as $mrk): ?>
        <div class="merk2">
            
            <div>
                <img src="img/<?php echo $mrk["gambar"]; ?>" alt="produk" width="70%">
                <p><?php echo $mrk["nama_produk"]; ?> <br> 
                <b><?php echo "Rp. ".$mrk['harga']; ?></b><br>
                <p><?php echo $mrk["alamat"]; ?></p>
                
                <a href="hapus.php?id=<?php echo $mrk["id"]; ?>"><button class="tombolHapus">HAPUS</button></a>
                <a href="update.php?id=<?php echo $mrk["id"]; ?>"><button class="tombolEdit">EDIT</button></a>
                <p class="pf"><?php echo "Di tambah pada : ".$mrk["tanggal"]; ?></p>
            </div>
           
    
    
        </div>
        <?php $i++; endforeach; ?>
    </div>


    <footer>
        <p class="nama">Sabrina Nur Az-zahra</p>
    </footer>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>