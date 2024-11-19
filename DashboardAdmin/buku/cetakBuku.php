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
    <h2 class="text-center"><strong>Laporan Buku Pustaka</strong></h2>
    <h4 class="text-center">POLITEKNIK NEGERI PADANG</h4>
    <di class="col-sm-6">
    <div class="container">
        <table class="table table-bordered">
            <thead class="thead-light text-center">
                <tr>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">ID Buku</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Judul Buku</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Pengarang</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Penerbit</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Tahun Terbit</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Halaman</th>

                </tr>
            </thead>
            <tbody>
                <?php
                require '../../config/config.php';

                $query = "SELECT * FROM buku";
                $result = $connection->query($query);

                if (!$result) {
                    die("Error in query: " . $db->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_buku'] . "</td>";
                    echo "<td>" . $row['judul'] . "</td>";
                    echo "<td>" . $row['pengarang'] . "</td>";
                    echo "<td>" . $row['penerbit'] . "</td>";
                    echo "<td>" . $row['tahun_terbit'] . "</td>";
                    echo "<td>" . $row['jumlah_halaman'] . "</td>";
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
        <a class="btn btn-primary text-tertiary" href="daftarBuku.php">Browse</a>
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