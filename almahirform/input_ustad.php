<?php
$pageTitle = 'Tambah Ustadz';
require __DIR__ . '/header.php';
?>
<form class="data-form" action="simpan_ustadz.php" method="post">
  <label for="nip">NIP</label>
  <input type="text" id="nip" name="nip" maxlength="50" required>

  <label for="nama_ustadz">Nama ustadz</label>
  <input type="text" id="nama_ustadz" name="nama_ustadz" maxlength="50" required>

  <label for="tmpt_lahir">Tempat lahir</label>
  <input type="text" id="tmpt_lahir" name="tmpt_lahir" maxlength="100" required>

  <label for="tgl_lahir">Tanggal lahir</label>
  <input type="date" id="tgl_lahir" name="tgl_lahir" required>

  <label for="tlp_ustadz">Telepon</label>
  <input type="tel" id="tlp_ustadz" name="tlp_ustadz" maxlength="20">

  <label for="jabatan">Jabatan</label>
  <input type="text" id="jabatan" name="jabatan" maxlength="20" required>

  <label for="bidang">Bidang</label>
  <input type="text" id="bidang" name="bidang" maxlength="50" required>

  <button class="btn-submit" type="submit">Simpan Ustadz</button>
</form>
<a class="button-link secondary" href="data_ustad.php">Kembali ke Data Ustadz</a>
<?php require __DIR__ . '/footer.php'; ?>
