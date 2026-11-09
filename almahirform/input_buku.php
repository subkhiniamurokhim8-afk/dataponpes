<?php
$pageTitle = 'Tambah Buku';
require __DIR__ . '/header.php';
?>
<form class="data-form" action="simpan_buku.php" method="post">
  <label for="isbn">ISBN</label>
  <input type="text" id="isbn" name="isbn" maxlength="20" required>

  <label for="judul_buku">Judul buku</label>
  <input type="text" id="judul_buku" name="judul_buku" maxlength="100" required>

  <label for="pengarang">Pengarang</label>
  <input type="text" id="pengarang" name="pengarang" maxlength="255" required>

  <label for="penerbit">Penerbit</label>
  <input type="text" id="penerbit" name="penerbit" maxlength="100" required>

  <label for="kategori">Kategori</label>
  <input type="text" id="kategori" name="kategori" maxlength="80" required>

  <label for="harga">Harga (Rp)</label>
  <input type="number" id="harga" name="harga" min="0" required>

  <label for="diskon">Diskon (%)</label>
  <input type="number" id="diskon" name="diskon" min="0" max="100">

  <button class="btn-submit" type="submit">Simpan Buku</button>
</form>
<a class="button-link secondary" href="data_buku.php">Kembali ke Data Buku</a>
<?php require __DIR__ . '/footer.php'; ?>