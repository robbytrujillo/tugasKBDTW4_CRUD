<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "nilai_mahasiswa");

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form
$kodeMk = $_POST['kode_mk'];
$mataKuliah = $_POST['mata_kuliah'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$nilaiTugas = $_POST['nilai_tugas'];
$nilaiUts = $_POST['nilai_uts'];
$nilaiUas = $_POST['nilai_uas'];
$nilaiAkhir = $_POST['nilai_akhir'];
$grade = $_POST['grade'];

// Query untuk menyimpan data ke tabel laporan_nilai
$sql = "INSERT INTO laporan_nilai (kode_mk, mata_kuliah, nim, nama, tugas, nilai_uts, nilai_uas, nilai_akhir, grade) VALUES ('$kodeMk', '$mataKuliah', '$nim', '$nama', '$nilaiTugas', '$nilaiUts', '$nilaiUas', '$nilaiAkhir', '$grade')";

// Eksekusi query
if (mysqli_query($conn, $sql)) {
    echo "Data berhasil disimpan ke tabel laporan_nilai.";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>
