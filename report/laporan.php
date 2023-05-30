<?php
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "nilai_mahasiswa");

    // Periksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Ambil mata kuliah dari form
    $selected_matkul = $_POST['mata_kuliah'];

    // Query untuk mengambil data nilai mahasiswa berdasarkan mata kuliah
    $sql = "SELECT * FROM nilai_mahasiswa WHERE kode='$selected_mata_kuliah'";

    // Eksekusi query
$result = mysqli_query($conn, $sql);

// Tutup koneksi
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Nilai Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Laporan Nilai Mahasiswa</h2>
    <table>
        <tr>
            <th>Kode Matakuliah</th>
            <th>Matakuliah</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tugas</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Grade</th>
        </tr>
        <?php
            // Tampilkan data ke dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['kode']."</td>";
                echo "<td>".$row['matkul']."</td>";
                echo "<td>".$row['nim']."</td>";
                echo "<td>".$row['nama']."</td>";
                echo "<td>".$row['tugas']."</td>";
                echo "<td>".$row['nilai_uts']."</td>";
                echo "<td>".$row['nilai_uas']."</td>";
                echo "<td>".$row['nilai_akhir']."</td>";
                echo "<td>".$row['grade']."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>