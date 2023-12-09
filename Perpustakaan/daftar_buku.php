<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/Style.css">
<title>Perpustakaan Online</title>
</head>
<body>
    
<div id="container">
<div class="header"><img src="images/logo.png" width="100" height="100"><h1>Perpustakaan UNS</h1></div>
<h4>Selamat Datang, Tiyo</h4>

<div class="main">
<div class="left">
<h3 align="center">MENU</h3>
<ul>
<li><a href="http://localhost/perpustakaan/index.php">Logout</a></li>
<li><a href="http://localhost/perpustakaan/home.php">Home</a></li>
<li><a href="#">Daftar Buku</a></li>
</ul>

<br>
</div>
</div>

<div class="middle2">
<h2 align="center">DAFTAR BUKU</h2><br>
<div align="center">
</div>

<?php

$serverName = "DESKTOP-U3GUEIF";
$database = "PERPUSTAKAAN";
$uid = "";
$pass = "";

$conection = [
    "Database" => $database, 
    "Uid" => $uid,
    "PWD" => $pass
    ];

$conn = sqlsrv_connect($serverName, $conection);
if(!$conn)
    die(print_r(sqlsrv_error(), true));

    $tsql = "SELECT * FROM BUKU JOIN PENULIS ON BUKU.IdPenulis = PENULIS.IdPenulis";

    $stmt = sqlsrv_query($conn, $tsql);

    if($stmt == false)
        echo "Error";

    while($obj = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
        echo "<p align=\"center\"><a href=\"http://localhost/perpustakaan/select_book.php?ISBN=".$obj["ISBN"]."\">".$obj["Judul"]."</p>";
        echo "<p align=\"center\"><a href=\"http://localhost/perpustakaan/select_author.php?authorId=".$obj["IdPenulis"]."\"> Penulis : ".$obj["NamaDepan"]." ".$obj["NamaBelakang"]."</p></br></br>";
    }
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
?>
</div>
</div>
</body>
</html>