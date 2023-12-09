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

    $ISBN = $_GET['ISBN']; 
    $tsql = "SELECT * FROM BUKU JOIN PENULIS ON BUKU.IdPenulis = PENULIS.IdPenulis WHERE ISBN = '$ISBN'";

    $stmt = sqlsrv_query($conn, $tsql);

    if($stmt == false)
        echo "Error";

    while($obj = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
        echo "Judul          : ".$obj["Judul"]."</br>";
        echo "Penerbit       : ".$obj["Penerbit"]."</br>";
        echo "Jumlah Halaman : ".$obj["JumlahHalaman"]."</br>";
        echo "Tahun Terbit   : ".$obj["ThnTerbit"]."</br>";
        echo "Penulis        : "."<a href=\"http://localhost/perpustakaan/select_author.php?authorId=".$obj["IdPenulis"]."\">".$obj["NamaDepan"]." ".$obj["NamaDepan"]."</br>";
    }
?>
</body>
