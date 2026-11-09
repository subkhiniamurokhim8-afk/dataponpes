<?php
$pageTitle = 'Data Mata Pelajaran';
require __DIR__ . '/header.php';
require __DIR__ . '/koneksi.php';
$subjects = $pdo->query('SELECT no_mapel, nama_mapel, jp_mapel, kategori_mapel FROM tb_mapel ORDER BY no_mapel')->fetchAll();
?>
<p>Daftar mata pelajaran yang tersimpan di database.</p>
<a class="button-link" href="input_mapel.php">Tambah Mata Pelajaran</a>
<div class="table-wrap">
  <table class="tabel">
    <thead><tr><th>No. Mapel</th><th>Nama Mata Pelajaran</th><th>Jam Pelajaran</th><th>Kategori</th></tr></thead>
    <tbody>
      <?php if (!$subjects): ?><tr><td colspan="4">Belum ada data mata pelajaran.</td></tr><?php endif; ?>
      <?php foreach ($subjects as $subject): ?>
        <tr>
          <td><?= htmlspecialchars((string) $subject['no_mapel'], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($subject['nama_mapel'], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars((string) $subject['jp_mapel'], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($subject['kategori_mapel'], ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php require __DIR__ . '/footer.php'; ?>