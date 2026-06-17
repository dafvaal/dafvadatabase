<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "dafva_database";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) { die("Koneksi gagal: " . mysqli_connect_error()); }
?>



<?php 
$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];

    // UNIT TESTING: Validasi input (Logika dasar)
    if (empty($nama) || empty($nim)) {
        $status = "UNIT TEST FAILED: Input tidak boleh kosong!";
    } else {
        // INTEGRATION TESTING: Interaksi dengan Database
        $sql = "INSERT INTO data_mahasiswa (nama, nim) VALUES ('$nama', '$nim')";
        if (mysqli_query($conn, $sql)) {
            // SYSTEM TESTING: Verifikasi alur menyeluruh berhasil
            $status = "SYSTEM TEST PASSED: Data berhasil disimpan ke database!";
        } else {
            $status = "INTEGRATION TEST FAILED: Database error!";
        }
    }
}
?>
<html>
<head><title>Testing Sistem</title></head>
<body>
    <h2>Form Testing System</h2>
    <form method="post">
        Nama: <input type="text" name="nama"><br>
        NIM: <input type="text" name="nim"><br>
        <button type="submit">Submit</button>
    </form>
    <h3><?php echo $status; ?></h3>
</body>
</html>