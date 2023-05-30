<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "nilai_mahasiswa");

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Periksa apakah ada data yang dikirim melalui URL
if (isset($_GET['id'])) {
    // Ambil id dari URL
    $id = $_GET['id'];

    // Query untuk mengambil data mahasiswa berdasarkan id
    $sql = "SELECT * FROM mahasiswa WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    // Periksa apakah data ditemukan
    if (mysqli_num_rows($result) > 0) {
        // Ambil data mahasiswa
        $row = mysqli_fetch_assoc($result);

        // Ambil nilai-nilai yang ingin diupdate
        $nim = $row['nim'];
        $nama = $row['nama'];
        $kode_mk = $row['kode_mk'];
        $mata_kuliah = $row['mata_kuliah'];
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tidak ditemukan.";
    exit;
}

// Periksa apakah form update telah disubmit
if (isset($_POST['update'])) {
    // Ambil data dari form
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kode_mk = $_POST['kode_mk'];
    $mata_kuliah = $_POST['mata_kuliah'];

    // Query untuk mengupdate data mahasiswa
    $sql = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', kode_mk = '$kode_mk', mata_kuliah = '$mata_kuliah' WHERE id = '$id'";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        // echo "Data berhasil diupdate.";
        header("Location: ../index.php");
        exit(); // Hentikan eksekusi skrip setelah melakukan pengalihan halaman
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Tutup koneksi
mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Nilai Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<div class="card">
<div class="card-header">
    <h1>Update Nilai Mahasiswa</h1>
</div>
<div class="card-body">
    <form action="update.php?id=<?php echo $id; ?>" method="POST">
        <div class="form-group">
        <label for="nim">NIM:</label>
        <input type="text" name="nim" value="<?php echo $nim; ?>" required><br>
        </div>

        <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $nama; ?>" required><br>
        </div>

        <div class="form-group">
        <label for="kode_mk">Kode:</label>
        <input type="text" name="kode_mk" value="<?php echo $kode_mk; ?>" required><br>
        </div>

        <div class="form-group">
        <label for="mata_kuliah">Mata Kuliah:</label>
        <input type="text" name="mata_kuliah" value="<?php echo $mata_kuliah; ?>" required><br>
        </div>

        <button type="submit" value="Ubah">Ubah</button>
    </form>
</div>
</div>

</body>
</html>
