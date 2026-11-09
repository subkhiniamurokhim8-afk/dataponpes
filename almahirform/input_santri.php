<?php
$pageTitle = 'Tambah Santri';
require __DIR__ . '/header.php';
?>
<form class="data-form" action="simpan_santri.php" method="post">
  <label for="no_induk">Nomor induk</label>
  <input type="number" id="no_induk" name="no_induk" min="1" max="2147483647" required>

  <label for="nama_santri">Nama santri</label>
  <input type="text" id="nama_santri" name="nama_santri" maxlength="50" required>

  <label for="tmpt_lahir">Tempat lahir</label>
  <input type="text" id="tmpt_lahir" name="tmpt_lahir" maxlength="100" required>

  <label for="tgl_lahir">Tanggal lahir</label>
  <input type="date" id="tgl_lahir" name="tgl_lahir" required>

  <label for="alamat">Alamat</label>
  <textarea id="alamat" name="alamat" required></textarea>

  <label for="nama_wali">Nama wali</label>
  <input type="text" id="nama_wali" name="nama_wali" maxlength="50">

  <label for="telp_santri">Telepon santri</label>
  <input type="tel" id="telp_santri" name="telp_santri" maxlength="20">

  <label for="telp_wali">Telepon wali</label>
  <input type="tel" id="telp_wali" name="telp_wali" maxlength="20">

  <button class="btn-submit" type="submit">Simpan Santri</button>
</form>
<a class="button-link secondary" href="data_santri.php">Kembali ke Data Santri</a>
<?php require __DIR__ . '/footer.php'; ?>
