<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_alat_tulis";
$charset = "utf8mb4";

$opt = [
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES=>true,
  ];

$conn = mysqli_connect($hostname, $username, $password, $database);