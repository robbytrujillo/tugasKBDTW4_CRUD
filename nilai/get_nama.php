<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "nilai_mahasiswa");

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil nim dari parameter GET
$nim = $_GET['nim'];

// Query untuk mengambil nama berdasarkan nim
$sql = "SELECT nama FROM mahasiswa WHERE nim = '$nim'";
$result = mysqli_query($conn, $sql);

// Buat array untuk menyimpan hasil query
$data = array();

// Ambil hasil query dan tambahkan ke array data
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Tutup koneksi
mysqli_close($conn);

// Kembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
