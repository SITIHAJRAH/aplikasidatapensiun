<?php
include 'includes_db.php'; // Pastikan untuk mengganti dengan path yang sesuai

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}

$success_message = ""; // Variabel untuk menyimpan pesan sukses

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan']; 
    $tanggal_pensiun = $_POST['tanggal_pensiun'];

    $sql = "INSERT INTO pensiun (nip, nama, jabatan, tanggal_pensiun) VALUES ('$nip', '$nama', '$jabatan', '$tanggal_pensiun')";
    
    if ($conn->query($sql) === TRUE) {
        $success_message = "Data pensiun berhasil disimpan!"; // Set pesan sukses
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pensiun</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #008b8b;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            background-color:  #1abc9c;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: green; ;
            color: white; /* Warna teks putih */
            padding: 10px 20px; /* Padding dalam tombol */
            border: none; /* Hilangkan border */
            border-radius: 4px; /* Sudut membulat */
            cursor: pointer; /* Tampilkan kursor pointer */
            font-size: 1.1em; /* Ukuran teks */
            text-align: center; /* Posisikan teks di tengah */
            display: inline-block; /* Supaya tombol sesuai dengan kontennya */
            text-decoration: none; /* Hilangkan garis bawah pada link */
            transition: background-color 0.3s ease, transform 0.3s ease; /* Animasi transisi */
            margin-top: 20px; /* Jarak di atas tombol */;
        }

        input[type="submit"]:hover {
            background-color:  #3498db;
        }
        .btn-kembali {
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
            margin-top: 20px;
        }
        .btn-kembali:hover {
            background-color: #2980b9;
        }
        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Data Pensiun</h1>

        <!-- Menampilkan pesan sukses jika ada -->
        <?php if ($success_message): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <form action="add.php" method="POST">
            <label for="nip">NIP:</label>
            <input type="text" id="nip" name="nip" required>
            
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="jabatan">Jabatan:</label>
            <input type="text" id="jabatan" name="jabatan" required>
            
            <label for="tanggal_pensiun">Tanggal Pensiun:</label>
            <input type="date" id="tanggal_pensiun" name="tanggal_pensiun" required>
            
            <input type="submit" value="Simpan">
        </form>
        
        <!-- Tombol kembali ke halaman data pensiun -->
        <a href="index.php" class="btn-kembali">Lihat Data Pensiun</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
