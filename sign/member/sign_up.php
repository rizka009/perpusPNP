<?php 
require "../../loginSystem/connect.php";
if(isset($_POST["signUp"]) ) {
  
  if(signUp($_POST) > 0) {
    echo "<script>
    alert('Sign Up berhasil!')
    </script>";
  }else {
    echo "<script>
    alert('Sign Up gagal!')
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
     <title>Sign Up || Member</title>
    </head>
  <body>
  <div class="d-flex justify-content-center pt-5 mt-5 mb-5">
    <div class="card bg-warning bg-opacity-25 " style="width: 30rem;">
      <div class="position-absolute top-0 start-50 translate-middle">
        <img src="../../assets/memberLogo.png" alt="adminLogo" width="85px">
      </div>
      <h1 class="pt-5 text-center fw-bold">Sign Up</h1>
      <hr>
    <form action="" method="post" class="row g-3 p-4 needs-validation" novalidate>
      
    <!-- <label for="validationCustom01" class="form-label">NIM</label>
    <div class="input-group mt-0">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-hashtag"></i></span>
    <input type="text" class="form-control" name="nisn" id="validationCustom01" required>
    <div class="invalid-feedback">
        Nisn wajib diisi!
    </div> 
  </div>-->
    <label for="validationCustom01" class="form-label">NIM</label>
  <div class="input-group mt-0">
    <input type="text" class="form-control" name="nisn" id="validationCustom01" required>
    <div class="invalid-feedback">
        Kode member wajib diisi!
    </div>
  </div>
  <label for="validationCustom02" class="form-label">Nama Lengkap</label>
  <div class="input-group mt-0">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
    <input type="text" class="form-control" id="validationCustom02" name="nama" required>
    <div class="invalid-feedback">
        Nama wajib diisi!
    </div>
  </div>
  <label for="validationCustom02" class="form-label">Password</label>
  <div class="input-group mt-0">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
    <input type="password" class="form-control" id="validationCustom02" name="password" required>
    <div class="invalid-feedback">
        Password wajib diisi!
    </div>
  </div>
  <label for="validationCustom02" class="form-label">Confirm Password</label>
  <div class="input-group mt-0">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
    <input type="password" class="form-control" id="validationCustom02" name="confirmPw" required>
    <div class="invalid-feedback">
        Konfirmasi password wajib diisi!
    </div>
  </div>
  
  <div class="col input-group mb-2">
  <label class="input-group-text" for="inputGroupSelect01">Gender</label>
  <select class="form-select" id="inputGroupSelect01" name="jenis_kelamin">
    <option selected>Choose</option>
    <option value="Laki laki">Laki laki</option>
    <option value="Perempuan">Perempuan</option>
    </select>
  </div>
  
  
  
  <div class="input-group mb-2">
  <label class="input-group-text" for="inputGroupSelect01">Jurusan</label>
  <select class="form-select" id="inputGroupSelect01" name="jurusan">
    <option selected>Choose</option>
    <option value="Teknilogi Informasi">Teknologi Informasi</option>
    <option value="Teknik Mesin">Teknik Mesin</option>
    <option value="Teknik Elektro">Teknik Elektro</option>
    <option value="Administrasi Niaga">Administrasi Niaga</option>
    <option value="Akuntansi">Akuntansi</option>
    <option value="Bahasa Inggris">Bahasa Inggris</option>
    <option value="Teknik Sipil">Teknik Sipil</option>
    </select>
  </div>

  <div class="col input-group mb-2">
  <label class="input-group-text" for="inputGroupSelect01">Prodi</label>
  <select class="form-select" id="inputGroupSelect01" name="kelas">
    <option selected>Choose</option>
    <option value="D4-Teknologi Rekayasa Perangkat Lunak">D4-Teknologi Rekayasa Perangkat Lunak</option>
    <option value="D3-Manajemen Informatika">D3-Manajemen Informatika</option>
    <option value="D3-Teknik Komputer">D3-Teknik Komputer</option>
    <option value="D3-Teknik Alat Berat">D3-Teknik Alat Berat</option>
    <option value="D4-Teknik Manufaktur">D4-Teknik Manufaktur</option>
    <option value="D4-Bahasa Inggris">D4-Bahasa Inggris</option>
    <option value="D3-Bahasa Inggris">D3-Bahasa Inggris</option>
    <option value="D4-Teknik Telekomunikasi">D4-Teknik Telekomunikasi</option>
    <option value="D4-Teknik Elektronika">D4-Teknik Elektronika</option>
    <option value="D3-Teknik Listrik">D3-Teknik Listrik</option>
    <option value="D3-Teknik Elektronika">D3-Teknik Elektronika</option>
    <option value="D3-Teknik Telekomunikasi">D3-Teknik Telekomunikasi</option>
    <option value="D4-Perancangan Jalan Dan Jembatan">D4-Perancangan Jalan Dan Jembatan</option>
    <option value="D4-Manajemen Rekayasa Konstruksi">D4-Manajemen Rekayasa Konstruksi</option>
    <option value="D4-Teknik Perencanaan Irigasi Dan Rawa">D4-Teknik Perencanaan Irigasi Dan Rawa</option>
    <option value="D4-Akuntansi">D4-Akuntansi</option>
    <option value="D3-Akuntansi">D3-Akuntansi</option>
    <option value="D4-Usaha Perjalanan Wisata">D4-Usaha Perjalanan Wisata</option>
    <option value="D3-Administrasi Bisnis">D3-Administrasi Bisnis</option>
    </select>
  </div>
  
  <label for="validationCustom01" class="form-label">No Telepon</label>
  <div class="input-group mt-0">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
    <input type="number" class="form-control" name="no_tlp" id="validationCustom01" required>
    <div class="invalid-feedback">
        No telepon wajib diisi!
    </div>
  </div>
  
  <label for="validationCustom01" class="form-label">Tanggal Pendaftaran</label>
  <div class="input-group mt-0">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-days"></i></span>
    <input type="date" class="form-control" name="tgl_pendaftaran" id="validationCustom01" required>
    <div class="invalid-feedback">
        Tanggal pendaftaran wajib diisi!
    </div>
  </div>
  
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="signUp">Sign Up</button>
    <input type="reset" class="btn btn-warning text-light" value="Reset">
  </div>
  <p>Already have an account? <a href="sign_in.php" class="text-decoration-none text-primary">Sign In</a></p>
</form>
</div>
  </div>
</body>
  
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
  </script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>