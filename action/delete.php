<?php
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "nilai_mahasiswa");

    // Periksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Ambil ID dari URL
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM mahasiswa WHERE id=$id";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);

    header("Location: ../index.php");
exit();
?>
