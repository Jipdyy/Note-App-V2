<?php
function getConnection(): PDO {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "note_vanilla";

    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname;unix_socket=/opt/lampp/var/mysql/mysql.sock", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die("Koneksi database gagal: " . $e->getMessage());
    }
}
