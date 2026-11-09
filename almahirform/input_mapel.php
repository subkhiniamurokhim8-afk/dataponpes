<?php
$pageTitle = 'Tambah Mata Pelajaran';
require __DIR__ . '/header.php';
?>
<form class="data-form" action="simpan_mapel.php" method="post">
  <label for="no_mapel">Nomor mata pelajaran</label>
  <input type="number" id="no_mapel" name="no_mapel" min="1" required>

  <label for="nama_mapel">Nama mata pelajaran</label>
  <input type="text" id="nama_mapel" name="nama_mapel" maxlength="50" required>

  <label for="jp_mapel">Jam pelajaran</label>
  <input type="number" id="jp_mapel" name="jp_mapel" min="1" required>

  <label for="kategori_mapel">Kategori</label>
  <input type="text" id="kategori_mapel" name="kategori_mapel" maxlength="80" required>

  <button class="btn-submit" type="submit">Simpan Mata Pelajaran</button>
</form>
<a class="button-link secondary" href="data_mapel.php">Kembali ke Data Mata Pelajaran</a>
<?php require __DIR__ . '/footer.php'; ?>