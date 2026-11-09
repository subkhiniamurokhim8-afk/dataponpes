<?php
$pageTitle = 'Status Penyimpanan';
require __DIR__ . '/header.php';
?>
<p class="notice"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></p>
<a class="button-link" href="<?= htmlspecialchars($returnUrl, ENT_QUOTES, 'UTF-8') ?>">
  <?= htmlspecialchars($returnLabel, ENT_QUOTES, 'UTF-8') ?>
</a>
<?php require __DIR__ . '/footer.php'; ?>
