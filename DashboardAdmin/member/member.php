<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/admin/sign_in.php");
  exit;
}
require "../../config/config.php";

$member = queryReadData("SELECT * FROM member");

if(isset($_POST["search"]) ) {
  $member = searchMember($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Member terdaftar</title>
  </head>
  <body>
    <nav class="navbar fixed-top bg-warning shadow-sm">
      <div class="container px-4 px-lg-1">
        <a class="navbar-brand" href="#">
          <img src="../../assets/lpnp.png" alt="logo" width="170px">
        </a>        
        <a class="btn btn-tertiary" href="../dashboardAdmin.php">Dashboard</a>
      </div>
    </nav>
    
    <div class="p-4 mt-3">
      <!--search engine --->
     <form action="" method="post" class="mt-5">
       <div class="input-group d-flex justify-content-end mb-3">
       <a class="btn btn-success ms-2 mx-3" href="tambahMember.php">Tambah Member</a> 
       <a  href="cetakMember.php" class="btn btn-danger text-light ms-2 mx-3"><span
                  class="bx bx-printer">Cetak</a>
                  
         <input class="border p-2 rounded rounded-end-0 bg-tertiary" type="text" name="keyword" id="keyword" placeholder="cari data member...">
         <button class="border border-start-0 bg-light rounded rounded-start-0" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
       </div>
      </form>
      
      <div class="table-responsive mt-3">
        <table id="example" class="table table-striped table-hover ">
        <thead class="text-center">
          <tr>
            <th class="bg-warning bg-opacity-50 shadow-sm text-dark">NIM</th>
            <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Nama</th>
            <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Jenis Kelamin</th>
            <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Prodi</th>
            <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Jurusan</th>
            <th class="bg-warning bg-opacity-50 shadow-sm text-dark">No Telepon</th>
            <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Pendaftaran</th>
            <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Action</th>
          </tr>
        </thead>
      <?php foreach($member as $item) : ?>
      <tr class="text-center">
        <td><?=$item["nisn"];?></td>
        <!-- <td><?=$item["kode_member"];?></td> -->
        <td><?=$item["nama"];?></td>
        <td><?=$item["jenis_kelamin"];?></td>
        <td><?=$item["kelas"];?></td>
        <td><?=$item["jurusan"];?></td>
        <td><?=$item["no_tlp"];?></td>
        <td><?=$item["tgl_pendaftaran"];?></td>
        <td>
          <div class="action">
          <a class="btn btn-success"  href="editsiswaadm.php?idReviews=<?= $item["nisn"]; ?>"><i class="fas fa-pencil-alt"></i></a>
             <a href="deleteMember.php?id=<?= $item["nisn"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data member ?');"><i class="fa-solid fa-trash"></i></a>
           </div>
        </td>
       </tr>
      <?php endforeach;?>
    </table>
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