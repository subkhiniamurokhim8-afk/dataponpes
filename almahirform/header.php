<?php
$pageTitle = $pageTitle ?? 'Al-Mahir';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?> - Al-Mahir</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <aside class="app-sidebar">
    <a class="app-brand" href="index.php">Al-Mahir</a>
    <nav class="sidebar-nav" aria-label="Menu utama">
      <span>MENU UTAMA</span>
      <a href="index.php">Dashboard</a>
      <a href="data_santri.php">Data Santri</a>
      <a href="data_ustad.php">Data Ustadz</a>
      <a href="data_mapel.php">Mata Pelajaran</a>
      <a href="data_buku.php">Data Buku</a>
    </nav>
    <div class="sidebar-footer">Administrasi Al-Mahir</div>
  </aside>
  <div class="content">
    <main class="main-content">
      <h1><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></h1>
