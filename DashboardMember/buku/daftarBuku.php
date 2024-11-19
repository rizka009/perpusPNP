<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}

require "../../config/config.php";
// query read semua buku
$buku = queryReadData("SELECT * FROM buku");
//search buku
if(isset($_POST["search"]) ) {
  $buku = search($_POST["keyword"]);
}
//read buku informatika
if(isset($_POST["informatika"]) ) {
$buku = queryReadData("SELECT * FROM buku WHERE kategori = 'informatika'");
}
//read buku bisnis
if(isset($_POST["bisnis"]) ) {
$buku = queryReadData("SELECT * FROM buku WHERE kategori = 'bisnis'");
}
//read buku filsafat
if(isset($_POST["filsafat"]) ) {
$buku = queryReadData("SELECT * FROM buku WHERE kategori = 'filsafat'");
}
//read buku novel
if(isset($_POST["novel"]) ) {
$buku = queryReadData("SELECT * FROM buku WHERE kategori = 'novel'");
}
//read buku sains
if(isset($_POST["sains"]) ) {
$buku = queryReadData("SELECT * FROM buku WHERE kategori = 'sains'");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Daftar Buku || Member</title>
  </head>
  <style>
    .layout-card-custom {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1.5rem;
    }
  </style>
  <body>
     <!-- NABAR -->
  <nav class="navbar fixed-top bg-warning bg-opacity-80 shadow-sm">
      <div class="container px-4 px-lg-1">
        <a class="navbar-brand" href="#">
          <img src="../../assets/lpnp.png" alt="logo" width="170px">
        </a>        
        <a class="btn btn-tertiary" href="../dashboardMember.php">Dashboard</a>
      </div>
  </nav>
    <!-- END NAVBAR -->
    
     <div class="p-4 mt-4">
       <!--Btn filter data kategori buku-->
      <div class="d-flex gap-2 mt-5 justify-content-center">
      <form action="" method="post">
        <div class="layout-card-custom">
         <button class="btn btn-primary" type="submit">Semua</button>
         <button type="submit" name="informatika" class="btn btn-outline-primary">Informatika</button>
         <button type="submit" name="bisnis" class="btn btn-outline-primary">Bisnis</button>
         <button type="submit" name="filsafat" class="btn btn-outline-primary">Filsafat</button>
         <button type="submit" name="novel" class="btn btn-outline-primary">Novel</button>
         <button type="submit" name="sains" class="btn btn-outline-primary">Sains</button>
         </div>
        </form>
       </div>
       
       <form action="" method="post" class="mt-2">
       <div class="input-group d-flex justify-content-end mb-3">
         <input class="border p-2 rounded rounded-end-0 bg-tertiary" type="text" name="keyword" id="keyword" placeholder="cari judul atau kategori buku...">
         <button class="border border-start-0 bg-light rounded rounded-start-0" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
       </div>
      </form>
      
      <!--Card buku-->
    <div class="layout-card-custom">
       <?php foreach ($buku as $item) : ?>
       <div class="card" style="width: 15rem;">
         <img src="../../imgDB/<?= $item["cover"]; ?>" class="card-img-top" alt="coverBuku" height="250px">
         <div class="card-body">
           <h5 class="card-title"><?= $item["judul"]; ?></h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Kategori : <?= $item["kategori"]; ?></li>
          </ul>
        <div class="card-body">
          <a class="btn btn-success" href="detailBuku.php?id=<?= $item["id_buku"]; ?>">Detail</a>
          </div>
        </div>
       <?php endforeach; ?>
      </div>
      
     </div>
     
     <!--====== FOOTER PART START ======-->
    <footer class="bg-body-secondary text-dark p-2 mt-5">
      <div class="container">
        <div class="row">
        <div class="container p-4">
          <!--Grid row-->
          <div class="row my-4">
            <!--Grid column-->
            <div class="col-md-4 px-6">

              <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto mt-5" style="width: 150px; height: 150px;">
                <img src="../../assets/pnp.png" width="150px" alt=""
                    loading="lazy" />
              </div>

              <p class="text-center">"Temukan Dunia Pengetahuan di Ujung Jari Anda: <br> Perpustakaan Online <span class="fw-bold">Perpustakaan PNP</span> Membawa Anda ke Dunia Buku Digital."</p>

              <ul class="list-unstyled d-flex flex-row justify-content-center">
                <li>
                  <a class="text-dark px-2" href="https://www.facebook.com/pnp.ac.id?mibextid=gik2fB">
                    <i class="fab fa-facebook-square"></i>
                  </a>
                </li>
                <li>
                  <a class="text-dark px-2" href="https://www.instagram.com/politekniknegeripadang_pnp?igsh=anIyejI3dnhwOTdx">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
                <li>
                  <a class="text-dark ps-2" href="https://youtube.com/@pnpbroadcast?si=0IzNXOilA1pvs1uA">
                    <i class="fab fa-youtube"></i>
                  </a>
                </li>
              </ul>

            </div>
          <div class="col-md-4 px-6 text-center">
            <h5 style="color: black;">Kelompok 2</h5>
            <ul class="list-unstyled" style="color: black;">
                  <a class="text-dark px-2" href="https://www.instagram.com/whyufkrii_?igsh=YnhrYTVjNXp6M3Vm"><i class="mt-3 fab fs-6 fa-instagram"></i> M Wahyu Fikri</a><br>
                  <p> 2201092015 </p>
                  <a class="text-dark px-2" href="https://www.instagram.com/rizka009_?igsh=dHlxb291emRyZGcz"><i class="mt-3 fab fs-6 fa-instagram"></i> Rizka</a><br>
                  <p> 2201091013 </p>
                  <a class="text-dark px-2" href="https://www.instagram.com/raachainn?igsh=NGVhN2U2NjQ0Yg%3D%3D&utm_source=qr"><i class="mt-3 fab fs-6 fa-instagram"></i> Rara Chairunnisa</a><br>
                  <p> 2201092030 </p>
                  <a class="text-dark px-2" href="https://www.instagram.com/salsabilla.agstn?igsh=dmhvNWVxYXJmd2pn"><i class="mt-3 fab fs-6 fa-instagram"></i> Salsabila Agustin Putri Yendi</a><br>
                  <p> 2201092054 </p>
              </ul>
          </div>
          <div class="col-md-4">
            <h5>Contact</h5>
            <address style="color: black; display: block;">
              Jl.Kampus Politeknik Negeri Padang<br>
              Limau Manis, Kecamatan Pauh Kota Padang<br>
              Provinsi Sumatera Barat<br>
              25164<br>
              <strong>Telepon:</strong> 0751865<br>
              <strong>Email:</strong> perpustakaan@pnp.ac.id
            </address>
            <!-- Embed Google Maps -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3100492018316!2d100.46357607424709!3d-0.9145625353313178!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b7be9e52a171%3A0x609ef1cc57a38e32!2sPoliteknik%20Negeri%20Padang!5e0!3m2!1sen!2sid!4v1704787825452!5m2!1sen!2sid" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
          </div>
        </div>
        <hr class="bg-light">
        <p class="text-center mb-0">&copy; Made width ❤️  © 2023 - KELOMPOK 2 </p>
      </div>
    </footer>
    <!--====== FOOTER PART ENDS ======-->

      
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    </body>
    </html>