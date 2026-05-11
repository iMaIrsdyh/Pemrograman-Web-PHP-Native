<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/database.php';

$id = $_GET['id'] ?? '';

// Validasi ID
if(empty($id) || !is_numeric($id)){
    header("Location: index.php");
    exit;
}

// Cek apakah data ada
$stmt = $conn->prepare("SELECT id FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows === 0){
    header("Location: index.php");
    exit;
}

// Hapus data
$stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
exit;
?>