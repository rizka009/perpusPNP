<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../sign/admin/sign_in.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Admin Dashboard</title>
  </head>
  <style>
    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      margin: 5px;
      width: 100%;
      /* background-color: red; */
      color: white;
      text-align: center;
    }
  </style>

  <body>
    
    <nav class="navbar fixed-top bg-warning bg-opacity-80 shadow-sm">
      <div class="container px-4 px-lg-1">
        <a class="navbar-brand" href="#">
          <img src="../assets/lpnp.png" alt="logo" width="170px">
        </a>  
        <div class="dropdown">
          <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../assets/adminLogo.png" alt="adminLogo" width="40px">
          </button>
        <ul style="margin-left: -7rem;" class="dropdown-menu position-absolute mt-2 p-2">
          <li>
            <a class="dropdown-item text-center" href="#">
            <img src="../assets/adminLogo.png" alt="adminLogo" width="30px">
            </a>
          </li>
          <li>
            <a class="dropdown-item text-center text-secondary" href="#"> <span class="text-capitalize"><?php echo $_SESSION['admin']['nama_admin']; ?></a>
            </span>
          </li>
          <hr>
          <li>
            <a class="dropdown-item text-center mb-2" href="#">Akun Terverifikasi <span class="text-primary"><i class="fa-solid fa-circle-check"></i></span></a>
          </li>
          <li>
            <a class="dropdown-item text-center p-2 bg-danger text-light rounded" href="signOut.php">Sign Out <i class="fa-solid fa-right-to-bracket"></i></a>
          </li>
          </ul>
        </div>
      </div>
    </nav>

    
    
    <div class="mt-5 p-4">
      <?php
      // Mendapatkan tanggal dan waktu saat ini
      $date = date('Y-m-d H:i:s'); // Format tanggal dan waktu default (tahun-bulan-tanggal jam:menit:detik)
      // Mendapatkan hari dalam format teks (e.g., Senin, Selasa, ...)
      $day = date('l');
      // Mendapatkan tanggal dalam format 1 hingga 31
      $dayOfMonth = date('d');
      // Mendapatkan bulan dalam format teks (e.g., Januari, Februari, ...)
      $month = date('F');
      // Mendapatkan tahun dalam format 4 digit (e.g., 2023)
      $year = date('Y');
      ?>

      <h1 class="mt-2 fw-bold ">Dashboard - <span class="fs-5 text-secondary "> <?php echo $day. " ". $dayOfMonth." ". " ". $month. " ". $year; ?> </span></h1>
    
      <div class="alert alert-dark bg-warning bg-opacity-25" role="alert">Selamat datang admin - <span class="fw-bold text-capitalize"><?php echo $_SESSION['admin']['nama_admin']; ?></span> di Dashboard Perpustakaan PNP</div>
      
      <div class="mt-4 p-4">

        <!-- <div class="row gap-2">
        <div class="col bg-info p-5 rounded">
          <a class="text-center text-decoration-none fs-2 text-light" href="member/member.php">Member</a>
        </div>
        <div class="col bg-success p-5 rounded">
          <a class="text-center text-decoration-none fs-2 text-light" href="buku/daftarBuku.php">Buku</a>
        </div>
        </div>
        <div class="row gap-2 mt-2">
        <div class="col bg-warning p-5 rounded">
          <a class="text-center text-decoration-none fs-2 text-light" href="peminjaman/peminjamanBuku.php">Peminjaman</a>
        </div>
        <div class="col bg-dark p-5 rounded">
          <a class="text-center text-decoration-none fs-2 text-light" href="pengembalian/pengembalianBuku.php">Pengembalian</a>
        </div>
        </div>
        <div class="row mt-2">
        <div class="col bg-danger p-5 rounded">
          <a class="text-center text-decoration-none fs-2 text-light" href="denda/daftarDenda.php">Denda</a>
        </div>
        </div> -->

        <div class="d-flex flex-wrap justify-content-center gap-3">
          <div class="cardImg">
            <a href="member/member.php">
              <img src="../assets/dashboardCardMember/member1.png" alt="daftar buku" style="max-width: 100%;" width="350px">
            </a>
          </div>
          <div class="cardImg">
            <a href="buku/daftarBuku.php">
            <img src="../assets/dashboardCardMember/daftarbuku1.png" alt="daftar buku" style="max-width: 100%;" width="350px">
            </a>
          </div>

          <div class="cardImg">
            <a href="peminjaman/peminjamanBuku.php">
              <img src="../assets/dashboardCardMember/peminjaman1.png" alt="daftar buku" style="max-width: 100%;" width="350px">
            </a>
          </div>
          <div class="cardImg">
            <a href="pengembalian/pengembalianBuku.php">
            <img src="../assets/dashboardCardMember/pengembalian1.png" alt="daftar buku" style="max-width: 100%;" width="350px">
            </a>
          </div>      
          <div class="cardImg">
            <a href="denda/daftarDenda.php">
            <img src="../assets/dashboardCardMember/denda1.png" alt="daftar buku" style="max-width: 100%;" width="350px">
            </a>
          </div>
        </div>

      </div>
      
    </div>
    
    <!-- <footer class="shadow-lg bg-warning p-1">
      <div class="container-fluid d-flex justify-content-between">
      <p class="mt-2">Created by <span class="text-primary"> KEL2</span> © 2023</p>
      <p class="mt-2">versi 1.0</p>
      </div>
    </footer> -->

    <!-- <div class="footer bg-light ">
        <div class="container px-4 px-lg-5  "><div class="small text-center text-muted">Made width ❤️  © 2023 - KELOMPOK 2</div></div> 
      </div> -->

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
                <img src="../assets/pnp.png" width="150px" alt=""
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

</div>
<!-- End of .container -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>