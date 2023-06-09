<?php
include 'koneksi.php';
session_start();

error_reporting(0);

// Fungsi untuk menghapus mata kuliah dari database
function deleteCourse($kode) {
    global $koneksi;

    // Hapus data mata kuliah dengan kode tertentu dari tabel daftar
    $sql = "DELETE FROM daftar WHERE kode = '$kode'";
    if (mysqli_query($koneksi, $sql)) {
        echo "Mata kuliah dengan kode $kode berhasil dihapus.";
    } else {
        echo "Terjadi kesalahan dalam menghapus mata kuliah.";
    }
}

// Memeriksa apakah parameter kode dan aksi delete diberikan
if (isset($_GET['kode']) && isset($_GET['aksi']) && $_GET['aksi'] === 'delete') {
    $kode = $_GET['kode'];
    deleteCourse($kode);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Daftar Matakuliah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-********" crossorigin="anonymous" />
    <link rel="stylesheet" href="admin.css">
    <script src="admin.js"></script>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-nav">
                <nav>
                    <ul>
                        <li><a href="#table">Mechatronics Course</a></li>
                    </ul>
                </nav>
            </div>
            <div class="sidebar-content">
                <p>Side Admin Kelompok 2</p>
                <p>Maritza Khansa (Project Manager)</p>
                <p>Miqdad Fauzan (Front End)</p>
                <p>Syauqiy Mutiara (Front End)</p>
                <p>Ali Chandra Rizki (Back End)</p>
                <p>Ilham Zam (Back End)</p>
            </div>
        </div>
        <div class="main-content">
            <nav class="navbar">
                <div class="navbar-left">
                    <a href="dosen.php">Mata Kuliah</a>
                </div>
                <div class="navbar-right">
                    <a href="index.php">Logout</a>
                </div>
            </nav>
            <div class="header">
                <h3></h3>
            </div>
            <table id="table">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php
                    include 'koneksi.php';

                    // Mengambil data mata kuliah dari tabel daftar
                    $sql = "SELECT * FROM daftar";
                    $result = mysqli_query($koneksi, $sql);

                    // Memeriksa apakah ada hasil data
                    if (mysqli_num_rows($result) > 0) {
                        // Menampilkan data ke dalam tabel
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["kode"] . "</td>";
                            echo "<td>" . $row["matkul"] . "</td>";
                            echo "<td>" . $row["sks"] . "</td>";
                            echo "<td><a href=\"admin.php?kode=" . $row["kode"] . "&aksi=delete\"><i class='fas fa-trash'></i></a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada data mata kuliah.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>


            <div id="createForm" class="hidden">
                <form action="admin.php" method="POST">
                    <label for="kodeInput">Kode:</label>
                    <input type="text" id="kodeInput" name="kodeInput" placeholder="Kode">
                    <span id="errorKode" class="error-message"></span>

                    <label for="mataKuliahInput">Mata Kuliah:</label>
                    <input type="text" id="mataKuliahInput" name="mataKuliahInput" placeholder="Mata Kuliah">
                    <span id="errorMataKuliah" class="error-message"></span>

                    <label for="sksInput">SKS:</label>
                    <input type="number" id="sksInput" name="sksInput" placeholder="SKS">
                    <span id="errorSKS" class="error-message"></span>

                    <button type="submit">Tambah Matakuliah</button>
                    <button type="button" onclick="cancelCreate()">Cancel</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
