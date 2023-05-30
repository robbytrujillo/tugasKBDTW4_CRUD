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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Nilai Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<body>
    <h2>Update Nilai Mahasiswa</h2>
    <form action="action/edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="nim">NIM:</label>
        <input type="text" name="nim" value="<?php echo $row['nim']; ?>" required><br>
        <label for="nama">Nama:</label>
    <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>

    <label for="kode">Kode:</label>
    <input type="text" name="kode_mk" value="<?php echo $row['kode_mk']; ?>" required><br>

    <label for="matkul">Mata Kuliah:</label>
    <input type="text" name="mata_kuliah" value="<?php echo $row['mata_kuliah']; ?>" required><br>

    <input type="submit" value="Update">
</form>
</body>
</html>

