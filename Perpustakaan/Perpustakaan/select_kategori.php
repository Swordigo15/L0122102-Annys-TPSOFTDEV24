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

    $Kat = $_GET['NamaKategori']; 
    echo "<p>Daftar Buku (Kategori : $Kat)</p>";
    $tsql = "SELECT * FROM Kategori";

    $stmt = sqlsrv_query($conn, $tsql);

    if($stmt == false)
        echo "Error";

    echo "<ul>";
    while($obj = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
        echo "<li></li>";
    }
    echo "</ul>";
?>
</body>
