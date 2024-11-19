<?php
require "../../config/config.php";
// Ambil data dari url
$review = $_GET["idReview"];
$reviewData = queryReadData("SELECT * FROM buku WHERE id_buku = '$review'")[0];

// ==== FASE PERCOBAAN DEBUGGING =====
/*
$reviewKategori = queryReadData("SELECT * FROM buku WHERE kategori = '$review'");
*/
// Data kategori buku
$kategori = queryReadData("SELECT * FROM kategori_buku"); 

if(isset($_POST["update"]) ) {
  
  if(updateBuku($_POST) > 0) {
    echo "<script>
    alert('Data buku berhasil diupdate!');
    document.location.href = 'daftarBuku.php';
    </script>";
  }else {
    echo "<script>
    alert('Data buku gagal diupdate!');
    </script>";
  }
  
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <title>Edit data buku || Admin</title>
  </head>
  <body>
  <nav class="navbar fixed-top bg-warning bg-opacity-80 shadow-sm">
      <div class="container px-4 px-lg-1">
        <a class="navbar-brand" href="#">
          <img src="../../assets/lpnp.png" alt="logo" width="170px">
        </a>        
        <!-- <a class="btn btn-tertiary" href="../dashboardAdmin.php">Dashboard</a> -->
        <a class="nav-link text-tertiary" href="daftarBuku.php">Browse</a>
      </div>
    </nav>
    
    <div class="d-flex justify-content-center pt-5 mt-5">
    <div class="card bg-warning bg-opacity-25" style="width: 35rem;">
      <h1 class="text-center fw-bold p-3">Form Edit buku</h1>
      <hr>
      <form action="" method="post" enctype="multipart/form-data" class=" p-2">
      <div class="custom-css-form ">
        <div class="mb-3">
          <input type="hidden" name="coverLama" value="<?= $reviewData["cover"];?>">
          <img src="../../imgDB/<?= $reviewData["cover"]; ?>" width="200px" >
          <!-- <label for="formFileMultiple" class="form-label">Cover Buku</label> -->
          <input class="form-control mt-1" type="file" name="cover" id="formFileMultiple">
          </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Id Buku</label>
          <input type="text" class="form-control" name="id_buku" id="exampleFormControlInput1" placeholder="example inf01" value="<?= $reviewData["id_buku"]; ?>">
        </div>
      </div>
    
      <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
        <select class="form-select" id="inputGroupSelect01" name="kategori">
          <option selected><?= $reviewData["kategori"]; ?></option>
          <?php foreach ($kategori as $item) : ?>
          <option><?= $item["kategori"]; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
        
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
          <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Buku" aria-label="Username" aria-describedby="basic-addon1" value="<?= $reviewData["judul"]; ?>">
          </div>
        
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Pengarang</label>
          <input type="text" class="form-control" name="pengarang" id="exampleFormControlInput1" placeholder="nama pengarang"  value="<?= $reviewData["pengarang"]; ?>">
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Penerbit</label>
          <input type="text" class="form-control" name="penerbit" id="exampleFormControlInput1" placeholder="nama penerbit"   value="<?= $reviewData["penerbit"]; ?>">
        </div>
        
        <label for="validationCustom01" class="form-label">Tahun Terbit</label>
        <div class="input-group mt-0">
          <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-days"></i></span>
          <input type="date" class="form-control" name="tahun_terbit" id="validationCustom01"  value="<?= $reviewData["tahun_terbit"]; ?>">
          </div>
          
        <label for="validationCustom01" class="form-label">Jumlah Halaman</label>
        <div class="input-group mt-0">
          <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book-open"></i></span>
          <input type="number" class="form-control" name="jumlah_halaman" id="validationCustom01"  value="<?= $reviewData["jumlah_halaman"]; ?>">
          </div>
        
        <div class="form-floating mt-3 mb-3">
          <textarea class="form-control" placeholder="sinopsis tentang buku ini" name="buku_deskripsi" id="floatingTextarea2" style="height: 100px"><?= $reviewData["buku_deskripsi"]; ?></textarea>
          <label for="floatingTextarea2">Sinopsis</label>
          </div>
          
      <button class="btn btn-success" type="submit" name="update">Edit</button>
      <a class="btn btn-danger" href="daftarBuku.php">Batal</a>
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