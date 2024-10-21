<?php
include 'includes_db.php';

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $tanggal_pensiun = $_POST['tanggal_pensiun'];

    $sql = "UPDATE pensiun SET nip='$nip', nama='$nama', jabatan='$jabatan', tanggal_pensiun='$tanggal_pensiun' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM pensiun WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pensiun</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #008b8b;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #1abc9c;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .container form {
            display: flex;
            flex-direction: column;
        }

        .container form label, 
        .container form input {
            margin-bottom: 15px;
        }

        .container {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Pensiun</h1>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST">
            <label for="nip">NIP:</label>
            <input type="text" id="nip" name="nip" value="<?php echo $row['nip']; ?>" required>
            
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
            
            <label for="jabatan">Jabatan:</label>
            <input type="text" id="jabatan" name="jabatan" value="<?php echo $row['jabatan']; ?>" required>
            
            <label for="tanggal_pensiun">Tanggal Pensiun:</label>
            <input type="date" id="tanggal_pensiun" name="tanggal_pensiun" value="<?php echo $row['tanggal_pensiun']; ?>" required>
            
            <input type="submit" value="Simpan">
        </form>
    </div>
</body>
</html>
