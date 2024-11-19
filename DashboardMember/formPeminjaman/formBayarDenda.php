<?php 
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}
require "../../config/config.php";

if(isset($_POST["bayar"]) ) {
  
  if(bayarDenda($_POST) > 0) {
    echo "<script>
    alert('Denda berhasil dibayar');
    document.location.href = 'TransaksiDenda.php';
    </script>";
  }else {
    echo "<script>
    alert('Denda gagal dibayar');
    </script>";
  }
  
}

$dendaSiswa = $_GET["id"];
$query = queryReadData("SELECT pengembalian.id_pengembalian, buku.judul, member.nama, pengembalian.buku_kembali, pengembalian.keterlambatan, pengembalian.denda
FROM pengembalian
INNER JOIN buku ON pengembalian.id_buku = buku.id_buku
INNER JOIN member ON pengembalian.nisn = member.nisn
WHERE pengembalian.id_pengembalian = $dendaSiswa");

?>

<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Form Bayar Denda || Member</title>
  </head>
  <body>
    <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
      <div class="container-fluid p-3">
        <a class="navbar-brand" href="#">
          <img src="../../assets/logoNav.png" alt="logo" width="120px">
        </a>
        
        <a class="btn btn-tertiary" href="../dashboardMember.php">Dashboard</a>
      </div>
    </nav>
    
  <div class="p-4 mt-5">
    <div class="mt-5 card p-3 mb-5">
    <form action="" method="post">
    <h3>Form bayar denda</h3>
      <?php foreach ($query as $item) : ?>
      <input type="hidden" name="id_pengembalian" id="id_pengembalian" value="<?= $item["id_pengembalian"]; ?>">
      
      <div class="mt-4 mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nama</label>
          <input type="text" class="form-control" placeholder="Nama siswa" name="nama" id="nama" value="<?= $item["nama"]; ?>" readonly>
          </div>
      
      <div class="d-flex flex-wrap gap-4">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Buku yang dipinjam</label>
          <input type="text" class="form-control" placeholder="Judul Buku" name="judul" id="judul" value="<?= $item["judul"]; ?>" readonly>
          </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Tanggal dikembalikan</label>
          <input type="date" class="form-control" name="buku_kembali" id="buku_kembali" value="<?= $item["buku_kembali"]; ?>" readonly>
          </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Besar Denda</label>
          <input type="number" class="form-control" name="denda" id="denda" value="<?= $item["denda"]; ?>" readonly>
          </div>
      </div>
      <?php endforeach; ?>
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Jumlah Denda yang dibayar</label>
          <input type="number" class="form-control" name="bayarDenda" id="bayarDenda" required>
      </div>
          
      <button type="reset" class="btn btn-warning text-light">Reset</button>
      <button type="submit" class="btn btn-success" name="bayar">Bayar</button>
    </form>
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