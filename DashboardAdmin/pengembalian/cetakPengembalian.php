<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Anggota</title>
    <!-- Tambahkan link CSS Bootstrap di sini -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print { 
            /* Sembunyikan tombol cetak saat mencetak */
            .btn-print {
                display: none;
            }
            
            /* Atur style yang ingin diaplikasikan saat mencetak */
            body {
                font-family: Arial, sans-serif;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            table, th, td {
                border: 1px solid black;
                padding: 8px;
            }

            th {
                background-color: #f2f2f2;
            }
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center"><strong>Laporan Pengembalian Buku Pustaka</strong></h2>
    <h4 class="text-center">POLITEKNIK NEGERI PADANG</h4>
    <di class="col-sm-6">
    <div class="container">
        <table class="table table-bordered">
            <thead class="thead-light text-center">
                <tr>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Id Pengembalian</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Id Buku</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Judul Buku</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Nim</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Nama Siswa</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Prodi</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Jurusan</th>                    
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Tanggal Pengembalian</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Keterlambatan</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Denda</th>

                </tr>
            </thead>
            <tbody>
                <?php
                require '../../config/config.php';
                $dataPeminjam = queryReadData("SELECT pengembalian.id_pengembalian, pengembalian.id_buku, buku.judul, buku.kategori, pengembalian.nisn, member.nama, member.kelas, member.jurusan, admin.nama_admin, pengembalian.buku_kembali, pengembalian.keterlambatan, pengembalian.denda
                                FROM pengembalian
                                INNER JOIN buku ON pengembalian.id_buku = buku.id_buku
                                INNER JOIN member ON pengembalian.nisn = member.nisn
                                INNER JOIN admin ON pengembalian.id_admin = admin.id");

                $query = "SELECT * FROM pengembalian INNER JOIN buku ON pengembalian.id_buku = buku.id_buku
                INNER JOIN member ON pengembalian.nisn = member.nisn
                INNER JOIN admin ON pengembalian.id_admin = admin.id";
                $result = $connection->query($query);

                if (!$result) {
                    die("Error in query: " . $db->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_pengembalian'] . "</td>";
                    echo "<td>" . $row['id_buku'] . "</td>";
                    echo "<td>" . $row['judul'] . "</td>";
                    echo "<td>" . $row['nisn'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['kelas'] . "</td>";
                    echo "<td>" . $row['jurusan'] . "</td>";
                    echo "<td>" . $row['buku_kembali'] . "</td>";
                    echo "<td>" . $row['keterlambatan'] . "</td>";
                    echo "<td>" . $row['denda'] . "</td>";
                    echo "</tr>";
                }

                $result->free_result();
                $connection->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Contoh tombol untuk mencetak -->
    <div class="container">
        <button onclick="window.print()" class="btn btn-success"><span class="bx bx-printer">Cetak</button>
        <a class="btn btn-primary text-tertiary" href="pengembalianBuku.php">Browse</a>
    </div>

    <!-- Tambahkan link JS Bootstrap di sini -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Sembunyikan tombol cetak setelah laporan dicetak
        window.onafterprint = function () {
            var btnPrint = document.querySelector('.btn-print');
            if (btnPrint) {
                btnPrint.classList.add('no-print');
            }
        };
    </script>
    </div>
</body>
</html>