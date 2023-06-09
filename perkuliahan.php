<?php
include "koneksi.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Daftar Matakuliah</title>
    <style>*, html, body {
  margin: 0;
  padding: 0;
  font-family: supreme, sans-serif;
}

body {
      background: linear-gradient(to right, #e1ecff 40%, #0059ff41);
}




.container {
  display: flex;
}

.sidebar {
  background-color:  rgba(255, 255, 255, 0.671);
  width: 185px;
  height: 600px;
  position: relative;
  right: 1px;

}

.sidebar-nav {
  padding: 10px;
}

.sidebar-nav ul {
  list-style-type: none;
  padding: 0;
}

.sidebar-nav ul li {
  margin-bottom: 20px;
}

.sidebar-nav ul li a {
  color: #f5f5f5;
  background-color: rgb(0, 0, 83);
  padding: 8px 180px;
  position: relative;
  right: 185px;
  font-size: 20px;
  font-weight: bold;
  height: 45px;
  display: flex;
  align-items: center;
  position: relative;
  bottom: 15px;
  text-decoration: none;

}


.sidebar-content {
  display: block;
  padding: 10px;
  color: #000000;
}


.sidebar-content p {
  padding: 3px;
  position: relative;
  top: 25px;
  margin: 0;
  display: flex;
  align-items: left;
  justify-content: left;
}


.main-content {
  flex-grow: 1;
  padding: 20px;
}

.navbar {
  background-color: #1c3c77;
  padding: 20px;
  display: flex;
  position: relative;
  top: -20px;
  justify-content: space-between;
  align-items: center;
  color: #ffffff;
}

.navbar-left>a {
  color: white;
  text-decoration: none;
}
.navbar-left :hover{
  border-radius: 5px;
  padding: 10px;
  width: 30px;
  height: 30px;
  background-color: lightgray;
  color: black;
  transition: all .3s ease-in-out;

}

.highlight {
  background-color: rgb(0, 0, 83);
  padding: 10px;
  text-decoration: none;
  border-radius: 5px;
}

.navbar-right a {
  color: white;
  text-decoration: none;
}




.navbar-right a:hover {
  background-color: rgb(255, 0, 0);
  border-radius: 100px;
  padding: 10px;
  width: 30px;
  height: 30px;
  color: black;
  transition: all .3s ease-in-out;

}


.header {
  text-align: center;
  margin-bottom: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
  position: relative;
  top: -20px;
  background-color:  rgba(255, 255, 255, 0.5);
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

tr:hover {

  background-color: #babbff;
  transition: all .2s ease-in-out;
}

thead th {
  background-color: #1c3c77;
  color: #ffffff;
  padding: 10px;
  text-align: left;
}

tbody td {
  padding: 20px;
  border-bottom: 1px solid #ddd;
}

tbody td:last-child {
  text-align: left;
}
.action-panel {
  position: relative;
  width: 20px;
  height: 20px;
  background-color: transparent;
  border: none;
  display: flex;
  align-items: center;
  justify-content: center;
}

.action-panel {
  position: relative;
  width: 20px;
  height: 20px;
  background-color: #ccc;
  border: none;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2; /* Tambahkan z-index */
}

.action-button {
  width: 100%;
  height: 100%;
  background-color: transparent;
  border: none;
  color: #383838;
  font-size: 0; /* Menghilangkan teks di dalam tombol */
  cursor: pointer;
  outline: none;
  z-index: 3; /* Tambahkan z-index */
}

.action-button :hover {
  background-color: #11811a;

}

.checkbox {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 14px;
  height: 14px;
  display: none; /* Tambahkan ini */
  z-index: 1;
}


.checkbox.checked {
  display: block; /* Tambahkan ini */
}

.checkbox.checked::after {
  content: "\2713"; /* Unicode karakter tanda centang */
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 30px; /* Ubah ukuran sesuai kebutuhan */
  color: #11811a;
  /* Warna tanda centang */
}

.upload-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 20px;
  width: 100%; /* Menyesuaikan lebar kontainer dengan tabel */
}

.upload-button {
  display: flex;
  padding: 10px 20px;
  background-color: #1c3c77;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-bottom: 10px;
  width: fit-content; /* Menggunakan lebar konten */
  max-width: 100%; /* Maksimum lebar sesuai kontainer */
}

#message {
  display: flex;
  font-size: 14px;
  color: #555555;
  position: relative;
  left: 500px;
  width: 100%; /* Menyesuaikan lebar dengan tabel */
}

#uploadButton {
  background-color: black;
  color: white;
}

.upload-button:hover {
  border-radius: 5px;
  background-color: rgb(0, 0, 83);
  transition: all 0.3s ease-in-out;
  transform: scale(0.9);
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);}</style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-nav">
                <nav>
                    <ul>
                        <li><a href="dosen.php">Mechatronics Course</a></li>
                    </ul>
                </nav>
            </div>
            <div class="sidebar-content">
                <p>Syauqiy Mutiara Siddiq</p>
                <p>1234567890</p>
            </div>
        </div>
        <div class="main-content">
            <nav class="navbar">
                <div class="navbar-left">
                    <a href="matkul.php">Daftar Mata Kuliah</a>
                    <a href="perkuliahan.php" class="highlight">Perkuliahan</a>
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
                        <th>Dosen</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                <?php
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
                    }?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="perkuliahan.js"></script>
</body>

</html>
