<?php
$pageTitle = 'Data Buku';
require __DIR__ . '/header.php';
require __DIR__ . '/koneksi.php';
$books = $pdo->query('SELECT isbn, judul_buku, pengarang, penerbit, kategori, harga, diskon FROM tb_buku ORDER BY judul_buku')->fetchAll();
?>
<p>Daftar buku yang tersimpan di database.</p>
<a class="button-link" href="input_buku.php">Tambah Buku</a>
<div class="table-wrap">
  <table class="tabel">
    <thead><tr><th>ISBN</th><th>Judul</th><th>Pengarang</th><th>Penerbit</th><th>Kategori</th><th>Harga</th><th>Diskon</th></tr></thead>
    <tbody>
      <?php if (!$books): ?><tr><td colspan="7">Belum ada data buku.</td></tr><?php endif; ?>
      <?php foreach ($books as $book): ?>
        <tr>
          <td><?= htmlspecialchars($book['isbn'], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($book['judul_buku'], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($book['pengarang'], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($book['penerbit'], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($book['kategori'], ENT_QUOTES, 'UTF-8') ?></td>
          <td>Rp <?= number_format((int) $book['harga'], 0, ',', '.') ?></td>
          <td><?= $book['diskon'] === null ? '-' : htmlspecialchars((string) $book['diskon'], ENT_QUOTES, 'UTF-8') . '%' ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php require __DIR__ . '/footer.php'; ?>
