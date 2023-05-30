<?php
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "nilai_mahasiswa");

    // Periksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Ambil data dari form
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kode_mk = $_POST['kode_mk'];
    $mata_kuliah = $_POST['mata_kuliah'];

    // Query untuk menyimpan data ke tabel
    $sql = "INSERT INTO mahasiswa (nim, nama, kode_mk, mata_kuliah) VALUES ('$nim', '$nama', '$kode_mk', '$mata_kuliah')";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);

    header("Location: ../index.php");
exit();
?>
