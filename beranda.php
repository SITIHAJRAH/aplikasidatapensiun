<?php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header('Location: beranda.php');
    exit;
}

// Koneksi ke database (ganti dengan detail Anda)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pensiun_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Aplikasi Pensiun</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #008b8b;
            margin: 0;
            padding: 0;
            color: #fff;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #1abc9c;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
        }
        h1 {
            text-align: center;
            color: black;
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        p {
            color: black;
            text-align: center;
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .btn {
            display: inline-block;
            margin: 10px;
            padding: 15px 25px;
            background-color: #008b8b;
            color: black;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-size: 1.1em;
        }
        .btn:hover {
            background-color: green;
            transform: translateY(-3px);
        }
        footer {
            text-align: center;
            margin-top: 30px;
            color: silver;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Aplikasi Pensiun PNS</h1>
        <p>Gunakan aplikasi ini untuk menyimpan data pensiun PNS</p>
        <div style="text-align: center;">
            <a href="index.php" class="btn">Lihat Data Pensiun</a>
            <a href="add.php" class="btn">Tambah Data Pensiun</a>
            <a href="admin_logout.php" class="btn">Logout</a>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Dinas Energi dan Sumber Daya Mineral Provinsi NTT</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
