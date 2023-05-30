<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "nilai_mahasiswa");

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil kode_mk dari parameter GET
$kodeMk = $_GET['kode_mk'];

// Query untuk mengambil mata kuliah berdasarkan kode_mk
$sql = "SELECT mata_kuliah FROM mahasiswa WHERE kode_mk = '$kodeMk'";
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
