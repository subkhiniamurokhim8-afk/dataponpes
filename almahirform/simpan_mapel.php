<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Metode tidak diizinkan.');
}

$numberInput = trim($_POST['no_mapel'] ?? '');
$name = trim($_POST['nama_mapel'] ?? '');
$hoursInput = trim($_POST['jp_mapel'] ?? '');
$category = trim($_POST['kategori_mapel'] ?? '');
$number = filter_var($numberInput, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
$hours = filter_var($hoursInput, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);

if ($number === false || $name === '' || $hours === false || $category === '') {
    http_response_code(400);
    exit('Nomor, nama, jam pelajaran, dan kategori wajib diisi dengan benar.');
}

try {
    require __DIR__ . '/koneksi.php';
    $statement = $pdo->prepare(
        'INSERT INTO tb_mapel (no_mapel, nama_mapel, jp_mapel, kategori_mapel)
         VALUES (:number, :name, :hours, :category)'
    );
    $statement->execute([
        'number' => $number,
        'name' => $name,
        'hours' => $hours,
        'category' => $category,
    ]);
    $message = 'Data mata pelajaran berhasil disimpan.';
} catch (PDOException $exception) {
    error_log($exception->getMessage());
    http_response_code(500);
    $message = (int) ($exception->errorInfo[1] ?? 0) === 1062
        ? 'Nomor mata pelajaran sudah terdaftar.'
        : 'Data mata pelajaran gagal disimpan. Periksa koneksi database dan isian form.';
}
$returnUrl = 'data_mapel.php';
$returnLabel = 'Kembali ke Data Mata Pelajaran';
require __DIR__ . '/hasil.php';