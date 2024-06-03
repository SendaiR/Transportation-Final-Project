<?php
$config = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'dbname' => 'transportation'
];

$conn = new mysqli(
    $config['host'],
    $config['username'],
    $config['password'],
    $config['dbname']
);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
