<?php
include 'includes_db.php';

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM pensiun WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error: " . $conn->error;
}
?>
