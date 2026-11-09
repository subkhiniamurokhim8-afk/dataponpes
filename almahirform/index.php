<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dasboard</title>
    <link rel="stylesheet" href="kotak.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
      *{
        margin: 0;
    }
    body{
        flex-direction: column;
    }
   
    .bapa{
        background-color: rgb(16, 8, 52);
        width: max-content;
        height: 100vh;
        position: relative;
        color: rgb(160, 236, 177);
        padding: 16px;
    }

    .provil{
        display: flex;
        gap: 7px;
    }

    .logo{
        background-color:transparent;
        align-items: center;
        justify-content: center;
        display: flex; 
    }

    img{
        height: 35px;
        width: 35px;
    }

    .nama-provile1{
        display: block;
        gap: 20px;
        align-items: center;
        justify-content: center;
        padding-top: 8px;
    }

    .menu{
        width: max-content;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        gap: 30px;
        padding-left: 12px;
    }

    .tombol{
        border-color: transparent;
        width: 200px;
    }

    .tombol a{
        padding-left: 0.5rem;
    }

    a{
        text-decoration:none;
        color: aliceblue;
    }


    .hr{
        padding-top: 25vh;
    }
    .penutup{
        display: flex;
        gap: 20px;
        padding-top: 15px;
    }

    .menu div:hover{
        background-color: rgb(94, 65, 240);
    }

    .tombol:hover{
        background-color:  rgb(96, 232, 130);
    }

    .isi-penutup{
        background-color: rgb(44, 253, 65);
        color: black;
        align-items: center;
        justify-content: center;
        border-radius: 100%;
        padding-top: 7px;
        width: 26px;
        height: 26px;
        text-align: center;
    }

    p{
        display: flex;
        text-align: center;
        padding-left: 17px;
    }

   .stav table{
        width: 130vh;
        height: 50vh; 
        border-collapse: collapse;
        margin-left: 7vh;
        margin-top: 19vh;
    }




    .stav thead tr th{
        border: 2px solid blue;
        color: rgb(147, 147, 184);
        background-color: rgb(18, 7, 65);
        height: 8vh;
        font-size: 3vh;
        font-weight: 70vh;
    }

    .stav tbody tr td{
        border: 2px solid rgb(143, 56, 223);
        background-color: rgb(12, 72, 64);
        color: aliceblue;
    }



    .great{
        display: flex;
    }


    .ketos {
    max-width: 800px;
    margin: 40px auto;
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.judos {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    padding: 22px 28px;
}

.judos h2 {
    color: #fff;
    margin: 0;
    font-size: 22px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-align: center;
}

.jatos {
    padding: 24px;
    overflow-x: auto;
    padding-bottom: 10vh;
}

table {
    width: 100%;
    border-collapse: collapse;
    font-size: 15px;
}

thead tr {
    background-color: #f1f5fb;
}

thead th {
    padding: 14px 16px;
    text-align: left;
    color: #1e3c72;
    font-weight: 700;
    text-transform: capitalize;
    border-bottom: 2px solid #2a5298;
    white-space: nowrap;
}

tbody td {
    padding: 14px 16px;
    color: #333;
    border-bottom: 1px solid #eaeef5;
    text-transform: capitalize;
}

tbody tr:nth-child(even) {
    background-color: #fafbfd;
}

tbody tr:hover {
    background-color: #eef3fc;
    transition: background-color 0.25s ease;
}

tbody tr:last-child td {
    border-bottom: none;
}

/* responsif untuk layar kecil */
@media (max-width: 600px) {
    .judos h2 {
        font-size: 18px;
    }

    thead th,
    tbody td {
        padding: 10px 8px;
        font-size: 13px;
    }
}
    
</style>
</head>
<body>
    <section class="bapa">
    <aside class="induk2">
        <!-- Profile -->
        <div class="provil">
            <div class="logo">
                <img src="img/logo_ppqita-removebg-preview.png" alt="logo pesantren">
            </div>
            <div class="nama-provile1">
                <div class="nama-provile">AL-MAHIR</div>
             </div>
        </div>

        <!-- Menu -->
        <div class="menu">
         <br>
            <div class="tombol"><i class="fa-solid fa-house"></i><a href="index.php">dasboard</a></div>
            <div class="tombol"><i class="fa-solid fa-chalkboard-user"></i><a href="data_ustad.php">data stav</a></div>
            <div class="tombol"><i class="fa-solid fa-graduation-cap"></i><a href="data_santri.php">data santri</a></div>
            <div class="tombol"><i class="fa-solid fa-warehouse"></i><a href="data_buku.php">data sarpras</a></div>               
            <div class="tombol"><i class="fa-solid fa-crown"></i><a href="data_mapel.php">ketua himsa</a></div>
            <div class="tombol"><i class="fa-solid fa-horse-head"></i><a href="input_mapel.php">wakil ketua</a></div>
            <br>
        </div>

        
        <!-- Footer -->

        <div class="hr">
            <hr>
         <div class="penutup">
            
            <div class="isi-penutup">
                <h4>SH</h4>
            </div>
            <div class="penutup-akhir">
                <div class="isi-penutup2">
                    <h4>admin</h4>
                </div>
                <div class="isi-penutup3">
                    @ppqita
                </div>
            </div>
         </div>
         <br>
         <p>keluar</p>
         </div>
        </aside>
    </section>
        


</body>
</html>
