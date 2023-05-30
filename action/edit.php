<?php
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "nilai_mahasiswa");

    // Periksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Ambil data dari form
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kode_mk = $_POST['kode_mk'];
    $mata_kuliah = $_POST['mata_kuliah'];

    // Query untuk memperbarui data di tabel
    $sql = "SELECT * FROM mahasiswa WHERE nim='$nim', nama='$nama', kode_mk='$kode_mk', mata_kuliah='$mata_kuliah' WHERE id=$id";
    
    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diperbarui";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
?>
