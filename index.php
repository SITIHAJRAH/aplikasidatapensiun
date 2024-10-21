<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pensiun_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan data pensiun 2021-2024
$sql = "SELECT * FROM pensiun WHERE YEAR(tanggal_pensiun) BETWEEN 2021 AND 2024";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pensiun PNS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #008b8b;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #1abc9c;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .button-container {
            display: flex;
            flex-direction: column; /* Vertikal */
            align-items: flex-start; /* Kiri */
            margin-top: 10px; /* Jarak di atas flex container */
            gap: 10px; /* Jarak antara tombol */
        }
        a.btn {
            background-color: green;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.1em;
            text-align: center;
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        a.btn:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #008b8b;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        .btn-edit {
            color: #FFA500;
            text-decoration: none;
        }
        .btn-delete {
            color: #FF0000;
            text-decoration: none;
        }
        .btn-edit:hover, .btn-delete:hover {
            text-decoration: underline;
        }
        .btn-kembali {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Pensiun PNS</h1>

        <!-- Tombol Tambah Data Pensiun dan Kembali ke Beranda dalam satu baris -->
        <div class="button-container">
            <a href="add.php" class="btn">Tambah Data </a>
            <a href="beranda.php" class="btn btn-kembali">Kembali ke Beranda</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Tanggal Pensiun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['nip']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['jabatan']; ?></td>
                            <td><?php echo $row['tanggal_pensiun']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a> |
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Tidak ada data yang ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
