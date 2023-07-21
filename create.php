<!-- create.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Tambah Data Mahasiswa</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1>Tambah Data Mahasiswa</h1>
    <form method="POST" action="">
      <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="alamat">Alamat:</label>
        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
      </div>

      <div class="form-group">
        <label for="gender">Jenis Kelamin:</label>
        <select name="gender" id="gender" class="form-control" required>
          <option value="">Pilih Jenis Kelamin</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>

      <div class="form-group">
        <label for="agama">Agama:</label>
        <select name="agama" id="agama" class="form-control" required>
          <option value="">Pilih Agama</option>
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Katolik">Katolik</option>
          <option value="Hindu">Hindu</option>
          <option value="Buddha">Buddha</option>
        </select>
      </div>

      <div class="form-group">
        <label for="asal_sekolah">Asal Sekolah:</label>
        <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" required>
      </div>

      <input type="submit" value="Tambah" class="btn btn-primary">
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
require_once('function.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $agama = $_POST['agama'];
    $asal_sekolah = $_POST['asal_sekolah'];

    // Periksa apakah variabel $conn sudah terdefinisi dengan benar sebelum melakukan operasi database
    if ($conn) {
        $sql = "INSERT INTO mahasiswa (nama, alamat, gender, agama, asal_sekolah) 
                VALUES ('$nama', '$alamat', '$gender', '$agama', '$asal_sekolah')";

        if ($conn->query($sql) === TRUE) {
            // Data berhasil ditambahkan, lakukan pengalihan halaman ke index.php setelah penundaan beberapa saat
            echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 2000);</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Koneksi ke database gagal.";
    }
}
?>
