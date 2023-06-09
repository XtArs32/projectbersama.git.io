<?php
$host = "localhost";
$user = "Xtars32";
$pass = "admin";
$db = "akademik";

$err = "";
$username = "";
$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == '' or $password == '')
    {
        $err .= "<li>Silahkan masukkan username dan password</li>";
    }else{
        $sql1 = "select * from login where username = '$username'";
        $q1 = mysqli_query($koneksi,$sql1);
        $r1 = mysqli_fetch_array($q1);


        if($r1['username'] == ''){
            $err .= "<li>Username <b>$username</b> tidak tersedia </li>";
        }elseif($r1['password'] != md5($password)){
            $err .= "<li>Password yang dimasukkan tidak sesuai</li>";
        }
        if (empty($err)) {
            $_SESSION['session_username'] = $username;
            $_SESSION['session_password'] = md5($password);

            $sql_role = "SELECT role FROM login WHERE username = '$username'";
            $query_role = mysqli_query($koneksi, $sql_role);
            $result_role = mysqli_fetch_array($query_role);

            if ($result_role['role'] == 'admin') {
                header("location: admin.php");
            } elseif ($result_role['role'] == 'user') {
                header("location: matkul.php");
            } else {
                // Jika tidak ada peran yang cocok atau peran belum ditentukan, arahkan pengguna ke halaman default
                header("location: default_page.php");
            }
            exit();
        }
    }
}
// Fungsi untuk memeriksa role pengguna
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kodeInput = $_POST['kodeInput'];
    $mataKuliahInput = $_POST['mataKuliahInput'];
    $sksInput = $_POST['sksInput'];

    // Buat query untuk menyimpan data ke database
    $query = "INSERT INTO daftar (kode, matkul, sks) VALUES ('$kodeInput', '$mataKuliahInput', '$sksInput')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil disimpan.')</script>";
        // Lakukan tindakan selanjutnya, misalnya redirect ke halaman lain
        header("Location: admin.php");
        exit();
    } else {
        echo "<script>alert('Terjadi kesalahan saat menyimpan data.')</script>";
        // Lakukan penanganan kesalahan, misalnya tampilkan pesan error atau log error
        echo mysqli_error($koneksi);
    }
}

if(isset($_POST['delete'])) {
    $kode = $_POST['kode'];

    // Hapus data dari tabel daftar berdasarkan kode
    $sql = "DELETE FROM daftar WHERE kode='$kode'";
    $result = mysqli_query($koneksi, $sql);

    if($result) {
        echo "<script>alert('Data berhasil dihapus.');</script>";
    } else {
        echo "<script>alert('Gagal menghapus data.');</script>";
    }
}
?>
