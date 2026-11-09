<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Metode tidak diizinkan.');
}

$nip = trim($_POST['nip'] ?? '');
$namaUstadz = trim($_POST['nama_ustadz'] ?? '');
$tempatLahir = trim($_POST['tmpt_lahir'] ?? '');
$tanggalLahir = trim($_POST['tgl_lahir'] ?? '');
$telepon = trim($_POST['tlp_ustadz'] ?? '');
$jabatan = trim($_POST['jabatan'] ?? '');
$bidang = trim($_POST['bidang'] ?? '');

if ($nip === '' || $namaUstadz === '' || $tempatLahir === '' || $tanggalLahir === '' || $jabatan === '' || $bidang === '') {
    http_response_code(400);
    exit('NIP, nama, tempat lahir, tanggal lahir, jabatan, dan bidang wajib diisi.');
}

try {
    require __DIR__ . '/koneksi.php';
    $statement = $pdo->prepare(
        'INSERT INTO tb_ustadz
            (nip, nama_ustadz, tmpt_lahir, tgl_lahir, tlp_ustadz, jabatan, bidang)
         VALUES
            (:nip, :nama_ustadz, :tmpt_lahir, :tgl_lahir, :tlp_ustadz, :jabatan, :bidang)'
    );
    $statement->execute([
        'nip' => $nip,
        'nama_ustadz' => $namaUstadz,
        'tmpt_lahir' => $tempatLahir,
        'tgl_lahir' => $tanggalLahir,
        'tlp_ustadz' => $telepon !== '' ? $telepon : null,
        'jabatan' => $jabatan,
        'bidang' => $bidang,
    ]);
    $message = 'Data ustadz berhasil disimpan.';
} catch (PDOException $exception) {
    error_log($exception->getMessage());
    http_response_code(500);
    $message = (int) ($exception->errorInfo[1] ?? 0) === 1062
        ? 'NIP tersebut sudah terdaftar.'
        : 'Data ustadz gagal disimpan. Periksa koneksi database dan isian form.';
}
$returnUrl = 'data_ustad.php';
$returnLabel = 'Kembali ke Data Ustadz';
require __DIR__ . '/hasil.php';
