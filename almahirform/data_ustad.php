<?php
$pageTitle = 'Data Ustadz';
require __DIR__ . '/header.php';
require __DIR__ . '/koneksi.php';
$teachers = $pdo->query('SELECT nip, nama_ustadz, tmpt_lahir, tgl_lahir, tlp_ustadz, jabatan, bidang FROM tb_ustadz ORDER BY nama_ustadz')->fetchAll();
?>
<p>Daftar ustadz yang tersimpan di database.</p>
<a class="button-link" href="input_ustad.php">Tambah Ustadz</a>
<div class="table-wrap">
  <table class="tabel">
    <thead><tr><th>NIP</th><th>Nama</th><th>Tempat, Tanggal Lahir</th><th>Telepon</th><th>Jabatan</th><th>Bidang</th></tr></thead>
    <tbody>
      <?php if (!$teachers): ?><tr><td colspan="6">Belum ada data ustadz.</td></tr><?php endif; ?>
      <?php foreach ($teachers as $teacher): ?>
        <tr>
          <td><?= htmlspecialchars($teacher['nip'], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($teacher['nama_ustadz'], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($teacher['tmpt_lahir'], ENT_QUOTES, 'UTF-8') ?>, <?= htmlspecialchars($teacher['tgl_lahir'], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($teacher['tlp_ustadz'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($teacher['jabatan'], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($teacher['bidang'], ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php require __DIR__ . '/footer.php'; ?>
