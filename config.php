<?php
/**
 * Konfigurasi koneksi database MySQL.
 * Kalau koneksi gagal, API mengirim JSON dengan HTTP 500,
 * bukan pesan error HTML bawaan PHP.
 */
require_once __DIR__ . "/helpers/response.php";

mysqli_report(MYSQLI_REPORT_OFF);

$host = getenv("DB_HOST") ?: "localhost";
$user = getenv("DB_USER") ?: "root";
$pass = getenv("DB_PASS") ?: "";
$db   = getenv("DB_NAME") ?: "pdcs";
$port = (int) (getenv("DB_PORT") ?: 3306);

$koneksi = @mysqli_connect($host, $user, $pass, $db, $port);

if (!$koneksi) {
    sendResponse(
        false,
        "Koneksi database gagal",
        null,
        500
    );
}

mysqli_set_charset($koneksi, "utf8mb4");
