<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!defined('ADMIN')) {
    define('ADMIN', 'admin');
}
if (!defined('KARYAWAN')) {
    define('KARYAWAN', 'karyawan');
}

$host = 'localhost'; // host
$username = 'apotek'; // username
$password = 'joinSocialClubNOW'; // password
$database = 'db_apotek'; // nama database
$port = 3306; // port
$socket = null; // socket

$conn = new mysqli($host, $username, $password, $database, $port, $socket); // koneksi

// koneksi gagal
if ($conn->connect_error) {
    echo 'Koneksi gagal';
    exit();
}

require_once 'functions.php';
