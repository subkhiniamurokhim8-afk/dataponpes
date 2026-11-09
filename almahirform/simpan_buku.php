<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Metode tidak diizinkan.');
}

$isbn = trim($_POST['isbn'] ?? '');
$judul = trim($_POST['judul_buku'] ?? '');
$pengarang = trim($_POST['pengarang'] ?? '');
$penerbit = trim($_POST['penerbit'] ?? '');
$kategori = trim($_POST['kategori'] ?? '');
$hargaInput = trim($_POST['harga'] ?? '');
$diskonInput = trim($_POST['diskon'] ?? '');
$harga = filter_var($hargaInput, FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]);
$diskon = $diskonInput === '' ? null : filter_var($diskonInput, FILTER_VALIDATE_INT, ['options' => ['min_range' => 0, 'max_range' => 100]]);

if ($isbn === '' || $judul === '' || $pengarang === '' || $penerbit === '' || $kategori === '' || $harga === false || ($diskonInput !== '' && $diskon === false)) {
    http_response_code(400);
    exit('Lengkapi semua data buku dan pastikan harga/diskon berupa angka yang valid.');
}

try {
    require __DIR__ . '/koneksi.php';
    $statement = $pdo->prepare(
        'INSERT INTO tb_buku (isbn, judul_buku, pengarang, penerbit, kategori, harga, diskon)
         VALUES (:isbn, :judul, :pengarang, :penerbit, :kategori, :harga, :diskon)'
    );
    $statement->execute([
        'isbn' => $isbn,
        'judul' => $judul,
        'pengarang' => $pengarang,
        'penerbit' => $penerbit,
        'kategori' => $kategori,
        'harga' => $harga,
        'diskon' => $diskon,
    ]);
    $message = 'Data buku berhasil disimpan.';
} catch (PDOException $exception) {
    error_log($exception->getMessage());
    http_response_code(500);
    $message = (int) ($exception->errorInfo[1] ?? 0) === 1062
        ? 'ISBN sudah terdaftar. Gunakan ISBN yang berbeda.'
        : 'Data buku gagal disimpan. Periksa koneksi database dan isian form.';
}
$returnUrl = 'data_buku.php';
$returnLabel = 'Kembali ke Data Buku';
require __DIR__ . '/hasil.php';