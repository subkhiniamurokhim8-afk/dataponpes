<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Metode tidak diizinkan.');
}

$noIndukInput = trim($_POST['no_induk'] ?? '');
$namaSantri = trim($_POST['nama_santri'] ?? '');
$tempatLahir = trim($_POST['tmpt_lahir'] ?? '');
$tanggalLahir = trim($_POST['tgl_lahir'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$namaWali = trim($_POST['nama_wali'] ?? '');
$telpSantri = trim($_POST['telp_santri'] ?? '');
$telpWali = trim($_POST['telp_wali'] ?? '');
$noInduk = filter_var($noIndukInput, FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1, 'max_range' => 2147483647],
]);

if ($noInduk === false || $namaSantri === '' || $tempatLahir === '' || $tanggalLahir === '' || $alamat === '') {
    http_response_code(400);
    exit('Nomor induk, nama, tempat lahir, tanggal lahir, dan alamat wajib diisi dengan benar.');
}

try {
    require __DIR__ . '/koneksi.php';
    $statement = $pdo->prepare(
        'INSERT INTO tb_santri
            (no_induk, nama_santri, tmpt_lahir, tgl_lahir, alamat, nama_wali, telp_santri, telp_wali)
         VALUES
            (:no_induk, :nama_santri, :tmpt_lahir, :tgl_lahir, :alamat, :nama_wali, :telp_santri, :telp_wali)'
    );
    $statement->execute([
        'no_induk' => $noInduk,
        'nama_santri' => $namaSantri,
        'tmpt_lahir' => $tempatLahir,
        'tgl_lahir' => $tanggalLahir,
        'alamat' => $alamat,
        'nama_wali' => $namaWali !== '' ? $namaWali : null,
        'telp_santri' => $telpSantri !== '' ? $telpSantri : null,
        'telp_wali' => $telpWali !== '' ? $telpWali : null,
    ]);
    $message = 'Data santri berhasil disimpan.';
} catch (PDOException $exception) {
    error_log($exception->getMessage());
    http_response_code(500);
    $message = (int) ($exception->errorInfo[1] ?? 0) === 1062
        ? 'Nomor induk sudah terdaftar. Gunakan nomor induk yang berbeda.'
        : 'Data santri gagal disimpan. Periksa koneksi database dan isian form.';
}
$returnUrl = 'data_santri.php';
$returnLabel = 'Kembali ke Data Santri';
require __DIR__ . '/hasil.php';
