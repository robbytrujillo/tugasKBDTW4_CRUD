<!DOCTYPE html>
<html>
<head>
    <title>Form Input Nilai</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<form action="simpan_nilai.php" method="POST">
    <h1>Form Input Nilai</h1>

    <form id="nilaiForm" onsubmit="handleSubmit(event)">
        <div class="form-group">
            <label for="kode_mk">Kode MK:</label>
            <select name="kode_mk" id="kode_mk" onchange="fillMataKuliah()">
                <option value="">Pilih Kode Mata Kuliah</option>
                <?php
                // Koneksi ke database
                $conn = mysqli_connect("localhost", "root", "", "nilai_mahasiswa");

                // Periksa koneksi
                if (!$conn) {
                    die("Koneksi gagal: " . mysqli_connect_error());
                }

                // Ambil data Kode MK dari tabel mahasiswa
                $sql = "SELECT DISTINCT kode_mk FROM mahasiswa";
                $result = mysqli_query($conn, $sql);

                // // Tampilkan data ke dalam dropdown
                // echo '<select name="kode_mk" id="kode_mk" onchange="fillMataKuliah()">';
                // echo '<option value="">Pilih Kode MK</option>';
                while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row['kode_mk'] . '">' . $row['kode_mk'] . '</option>';
                }
                echo '</select>';

                // Tutup koneksi
                mysqli_close($conn);
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="nim">NIM:</label>
            <select name="nim" id="nim" onchange="fillNama()">
                <option value="">Pilih NIM</option>
                <?php
                // Koneksi ke database
                $conn = mysqli_connect("localhost", "root", "", "nilai_mahasiswa");

                // Periksa koneksi
                if (!$conn) {
                    die("Koneksi gagal: " . mysqli_connect_error());
                }

                // Ambil data Kode MK dari tabel mahasiswa
                $sql = "SELECT DISTINCT nim FROM mahasiswa";
                $result = mysqli_query($conn, $sql);

                
                while ($row = mysqli_fetch_assoc($result)) {
                 echo '<option value="' . $row['nim'] . '">' . $row['nim'] . '</option>';
                }
                echo '</select>';

                // Tutup koneksi
                mysqli_close($conn);
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="nilai_tugas">Nilai Tugas:</label>
            <input type="number" name="nilai_tugas" id="nilai_tugas" min="0" max="100" required>
        </div>

        <div class="form-group">
            <label for="nilai_uts">Nilai UTS:</label>
            <input type="number" name="nilai_uts" id="nilai_uts" min="0" max="100" required>
        </div>

        <div class="form-group">
            <label for="nilai_uas">Nilai UAS:</label>
            <input type="number" name="nilai_uas" id="nilai_uas" min="0" max="100" required>
        </div>

        <button type="submit">Submit</button>
    </form>
</form>
    <script>
        function fillMataKuliah() {
            // Fungsi untuk mengisi field mata_kuliah berdasarkan kode_mk yang dipilih
            // Implementasikan kode pengisian field mata_kuliah dari tabel mahasiswa
        }

        function fillNama() {
            // Fungsi untuk mengisi field nama berdasarkan nim yang dipilih
            // Implementasikan kode pengisian field nama dari tabel mahasiswa
        }

        function handleSubmit(event) {
            event.preventDefault();

            // Ambil nilai dari form
            const kodeMk = document.getElementById('kode_mk').value;
            const nim = document.getElementById('nim').value;
            const nilaiTugas = parseFloat(document.getElementById('nilai_tugas').value);
            const nilaiUts = parseFloat(document.getElementById('nilai_uts').value);
            const nilaiUas = parseFloat(document.getElementById('nilai_uas').value);

            // Hitung nilai akhir
            const nilaiAkhir = 0.3 * nilaiTugas + 0.3 * nilaiUts + 0.4 * nilaiUas;

                        // Tentukan grade berdasarkan nilai akhir
                        let grade;
            if (nilaiAkhir >= 90 && nilaiAkhir <= 100) {
                grade = "A";
            } else if (nilaiAkhir >= 85 && nilaiAkhir < 90) {
                grade = "A-";
            } else if (nilaiAkhir >= 80 && nilaiAkhir < 85) {
                grade = "B+";
            } else if (nilaiAkhir >= 75 && nilaiAkhir < 80) {
                grade = "B";
            } else if (nilaiAkhir >= 70 && nilaiAkhir < 75) {
                grade = "B-";
            } else if (nilaiAkhir >= 65 && nilaiAkhir < 70) {
                grade = "C+";
            } else if (nilaiAkhir >= 60 && nilaiAkhir < 65) {
                grade = "C-";
            } else if (nilaiAkhir >= 50 && nilaiAkhir < 60) {
                grade = "D";
            } else if (nilaiAkhir >= 40 && nilaiAkhir < 50) {
                grade = "E";
            } else {
                grade = "T";
            }

            // Tampilkan hasil dalam popup
            const popupContent = `
                <h2>Hasil Input Nilai</h2>
                <p><strong>No.:</strong> 1</p>
                <p><strong>Nama:</strong> Nama Mahasiswa</p>
                <p><strong>Nilai Tugas:</strong> ${nilaiTugas}</p>
                <p><strong>Nilai UTS:</strong> ${nilaiUts}</p>
                <p><strong>Nilai UAS:</strong> ${nilaiUas}</p>
                <p><strong>Nilai Akhir:</strong> ${nilaiAkhir}</p>
                <p><strong>Grade:</strong> ${grade}</p>
                <p><strong>Total Nilai:</strong> Total Nilai Akhir</p>
                <p><strong>Nilai Rata-rata Kelas:</strong> Nilai Rata-rata Kelas</p>
            `;
            alert(popupContent);

            // Simpan data ke database nilai_mahasiswa pada tabel laporan_nilai
            // Implementasikan kode untuk menyimpan data ke database

            // Reset form
            document.getElementById('nilaiForm').reset();
        }
        
        </script>
</body>
</html>