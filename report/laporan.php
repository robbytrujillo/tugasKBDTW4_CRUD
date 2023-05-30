<?php
if (isset($_POST['mata_kuliah'])) {
    // Ambil data mata kuliah yang dipilih dari form
    $mata_kuliah = $_POST['mata_kuliah'];

    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "nilai_mahasiswa");

    // Periksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Query untuk mengambil data nilai berdasarkan mata kuliah
    $sql = "SELECT * FROM mahasiswa WHERE mata_kuliah = '$mata_kuliah'";
    $result = mysqli_query($conn, $sql);

    // Periksa apakah data ditemukan
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Cetak Laporan Nilai</h2>";
        echo "<table>";
        echo "<tr>";
        echo "<th>NIM</th>";
        echo "<th>Nama</th>";
        echo "<th>Kode_MK</th>";
        echo "<th>Mata Kuliah</th>";
        echo "<th>Nilai</th>";
        echo "</tr>";

        // Tampilkan data ke dalam tabel
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['nim']."</td>";
            echo "<td>".$row['nama']."</td>";
            echo "<td>".$row['kode_mk']."</td>";
            echo "<td>".$row['mata_kuliah']."</td>";
            echo "<td>".$row['nilai']."</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Data tidak ditemukan.";
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Nilai</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
    <h2>Cetak Laporan Nilai</h2>
    <form action="laporan.php" method="POST">
        <label for="mata_kuliah">Mata Kuliah:</label>
        <select name="mata_kuliah" required>
            <?php
            // Koneksi ke database
            $conn = mysqli_connect("localhost", "root", "", "nilai_mahasiswa");

            // Periksa koneksi
            if (!$conn) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }

            // Ambil data mata kuliah
            $sql = "SELECT * FROM mahasiswa GROUP BY kode_mk";
            $result = mysqli_query($conn, $sql);

            // Tampilkan data ke dalam dropdown
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='".$row['mata_kuliah']."'>".$row['kode_mk']." - ".$row['mata_kuliah']."</option>";
            }

            // Tutup koneksi
            mysqli_close($conn);
            ?>
        </select>
        <input type="submit" value="Cetak">
    </form>
</body>
</html>
