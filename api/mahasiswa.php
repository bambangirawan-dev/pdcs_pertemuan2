<?php
/**
 * Endpoint GET mahasiswa
 * URL : /pertemuan_2/api/mahasiswa.php
 * Data mahasiswa digabung dengan tabel jurusan memakai LEFT JOIN.
 */

require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../helpers/response.php";

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    sendResponse(false, "Method tidak diizinkan", null, 405);
}

$q = "SELECT m.id, m.nama, m.nim, j.nama_jurusan AS jurusan
      FROM mahasiswa m
      LEFT JOIN jurusan j ON m.jurusan_id = j.id
      ORDER BY m.id DESC";

$r = mysqli_query($koneksi, $q);

if (!$r) sendResponse(false, "query gagal: " . mysqli_error($koneksi), null, 500);

$data = [];
while ($row = mysqli_fetch_assoc($r)) {
    $row["id"] = (int) $row["id"];
    $data[] = $row;
}

sendResponse(true, "berhasil", $data, 200);
