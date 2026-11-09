<?php
declare(strict_types=1);

$databaseError = false;
$students = [];

try {
    require __DIR__ . '/koneksi.php';
    $students = $pdo->query(
        'SELECT no_induk, nama_santri, tmpt_lahir, tgl_lahir
         FROM tb_santri
         ORDER BY no_induk'
    )->fetchAll();
} catch (PDOException $exception) {
    error_log($exception->getMessage());
    $databaseError = true;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Santri - Al-Mahir</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .great {
            display: flex;
            min-height: 100vh;
        }

        .bapa {
            flex: 0 0 250px;
        }

        .bapa .induk2 {
            width: 250px;
            height: 100vh;
            padding: 16px;
            background-color: rgb(16, 8, 52);
            color: rgb(160, 236, 177);
        }

        .provil {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .logo img {
            width: 35px;
            height: 35px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 24px;
            margin-top: 24px;
        }

        .menu .tombol {
            width: 200px;
            padding: 6px;
        }

        .menu .tombol:hover {
            background-color: rgb(94, 65, 240);
        }

        .menu .tombol a {
            padding-left: 8px;
        }

        .hr {
            margin-top: 25vh;
        }

        .penutup {
            display: flex;
            gap: 20px;
            padding-top: 15px;
        }

        .isi-penutup {
            display: grid;
            width: 32px;
            height: 32px;
            place-items: center;
            border-radius: 50%;
            background-color: rgb(44, 253, 65);
            color: #000;
        }

        .stav {
            flex: 1;
            min-width: 0;
            padding: 32px;
            overflow-x: auto;
        }

        .stav h1 {
            margin-bottom: 20px;
            color: #172033;
        }

        .stav .tabel {
            width: 100%;
            min-width: 560px;
            height: auto;
            margin: 18px 0 0;
            border-collapse: collapse;
        }

        .stav .tabel th,
        .stav .tabel td {
            padding: 12px 14px;
            text-align: left;
        }

        .stav .tabel th:first-child,
        .stav .tabel td:first-child {
            text-align: center;
        }

        .add {
            display: inline-block;
            margin-top: 18px;
            padding: 10px 16px;
            border-radius: 8px;
            background-color: #827aff;
            color: #fff;
        }

        .add:hover {
            background-color: #7871df;
        }

        .database-error {
            margin: 16px 0;
            color: #b91c1c;
        }

        @media (max-width: 700px) {
            .bapa {
                flex-basis: 180px;
            }

            .bapa .induk2 {
                width: 180px;
                padding: 12px;
            }

            .stav {
                padding: 20px 12px;
            }
        }
    </style>
</head>
<body>
    <div class="great">
        <section class="bapa">
            <aside class="induk2">
                <div class="provil">
                    <div class="logo">
                        <img src="img/logo_ppqita-removebg-preview.png" alt="Logo pesantren">
                    </div>
                    <div class="nama-provile1">
                        <div class="nama-provile">AL-MAHIR</div>
                    </div>
                </div>

                <nav class="menu" aria-label="Menu utama">
                    <div class="tombol"><i class="fa-solid fa-house"></i><a href="index.php">dasboard</a></div>
                    <div class="tombol"><i class="fa-solid fa-chalkboard-user"></i><a href="data_ustad.php">data stav</a></div>
                    <div class="tombol"><i class="fa-solid fa-graduation-cap"></i><a href="data_santri.php">data santri</a></div>
                    <div class="tombol"><i class="fa-solid fa-warehouse"></i><a href="data_buku.php">data sarpras</a></div>
                    <div class="tombol"><i class="fa-solid fa-crown"></i><a href="data_mapel.php">ketua himsa</a></div>
                    <div class="tombol"><i class="fa-solid fa-horse-head"></i><a href="input_mapel.php">wakil ketua</a></div>
                </nav>

                <div class="hr">
                    <hr>
                    <div class="penutup">
                        <div class="isi-penutup"><h4>SH</h4></div>
                        <div class="penutup-akhir">
                            <div class="isi-penutup2"><h4>admin</h4></div>
                            <div class="isi-penutup3">@ppqita</div>
                        </div>
                    </div>
                    <br>
                    <p>keluar</p>
                </div>
            </aside>
        </section>

        <main class="stav">
            <h1>Data Santri</h1>
            <?php if ($databaseError): ?>
                <p class="database-error" role="alert">Data santri tidak dapat dimuat. Pastikan MySQL aktif dan database db_almahir tersedia.</p>
            <?php else: ?>
                <div class="table-wrap">
                    <table class="tabel">
                        <thead class="sub">
                            <tr>
                                <th>No. Induk</th>
                                <th>Nama</th>
                                <th>Asal</th>
                                <th>TTL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$students): ?>
                                <tr><td colspan="4">Belum ada data santri.</td></tr>
                            <?php endif; ?>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td><?= htmlspecialchars((string) $student['no_induk'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($student['nama_santri'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($student['tmpt_lahir'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars(date('d-m-Y', strtotime($student['tgl_lahir'])), ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <a class="add" href="input_santri.php">Tambah Santri</a>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
