<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi CRUD Nilai Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<body>

<div class="card">
<div class="card-header">
<h1>Nilai Mahasiswa</h1>
<center><h3>By : 2111601809 | <span style="color: darkorange">Robby Ilhamkusuma</span></h3></center>
</div>

<div class="card-body">
<form action="action/insert.php" method="POST">
    <div class="form-group">
    <label for="nim">NIM:</label>
    <input type="text" name="nim" required><br>
</div>

<div class="form-group">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" required><br>
    </div>

    <div class="form-group">
    <label for="kode_mk">Kode:</label>
    <input type="text" name="kode_mk" required><br>
    </div>

    <div class="form-group">
    <label for="mata_kuliah">Mata Kuliah:</label>
    <input type="text" name="mata_kuliah" required><br>
    </div>

    <button type="submit" value="Tambah">Tambah</button>
</form> 
</div>    
</div>


    <h2>Data Nilai Mahasiswa</h2>
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kode</th>
            <th>Mata Kuliah</th>
            <th>Action</th>
        </tr>
        <?php
            // Koneksi ke database
            $conn = mysqli_connect("localhost", "root", "", "nilai_mahasiswa");

            // Periksa koneksi
            if (!$conn) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }

            // Ambil data dari tabel
            $sql = "SELECT * FROM mahasiswa";
            $result = mysqli_query($conn, $sql);

            // Tampilkan data ke dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['nim']."</td>";
                echo "<td>".$row['nama']."</td>";
                echo "<td>".$row['kode_mk']."</td>";
                echo "<td>".$row['mata_kuliah']."</td>";
                echo "<td><a href='action/update.php?id=".$row['id']."'>Update</a> | <a href='action/delete.php?id=".$row['id']."'>Delete</a></td>";
                echo "</tr>";
            }

            // Tutup koneksi
            mysqli_close($conn);
        ?>
    </table>

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
                $sql = "SELECT * FROM mahasiswa GROUP BY kode";
                $result = mysqli_query($conn, $sql);

                // Tampilkan data ke dalam dropdown
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='"['kode']."'>".$row['kode']." - ".$row['mata_kuliah']."</option>";
                }

                            // Tutup koneksi
            mysqli_close($conn);
            ?>
        </select>
        <input type="submit" value="Cetak">
    </form>

    
