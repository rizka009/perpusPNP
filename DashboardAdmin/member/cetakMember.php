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
    <h2 class="text-center"><strong>Laporan Member Pustaka</strong></h2>
    <h4 class="text-center">POLITEKNIK NEGERI PADANG</h4>
    <di class="col-sm-6">
    <div class="container">
        <table class="table table-bordered">
            <thead class="thead-light text-center">
                <tr>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">NIM</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Nama</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Jenis Kelamin</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">Prodi</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">jurusan</th>
                    <th class="bg-warning bg-opacity-50 shadow-sm text-dark">HP</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require '../../config/config.php';

                $query = "SELECT * FROM member";
                $result = $connection->query($query);

                if (!$result) {
                    die("Error in query: " . $db->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nisn'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['jenis_kelamin'] . "</td>";
                    echo "<td>" . $row['kelas'] . "</td>";
                    echo "<td>" . $row['jurusan'] . "</td>";
                    echo "<td>" . $row['no_tlp'] . "</td>";
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
        <a class="btn btn-primary text-tertiary" href="member.php">Browse</a>
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