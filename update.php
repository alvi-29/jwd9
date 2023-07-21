<!-- update.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Edit Data Mahasiswa</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1>Edit Data Mahasiswa</h1>
    <?php
    require_once('function.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch existing data from the database based on the ID
        $sql = "SELECT * FROM mahasiswa WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form method="POST" action="">
              <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
              </div>

              <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" id="alamat" class="form-control" required><?php echo $row['alamat']; ?></textarea>
              </div>

              <div class="form-group">
                <label for="gender">Jenis Kelamin:</label>
                <select name="gender" id="gender" class="form-control" required>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="Laki-laki" <?php if ($row['gender'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                  <option value="Perempuan" <?php if ($row['gender'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
              </div>

              <div class="form-group">
                <label for="agama">Agama:</label>
                <select name="agama" id="agama" class="form-control" required>
                  <option value="">Pilih Agama</option>
                  <option value="Islam" <?php if ($row['agama'] == 'Islam') echo 'selected'; ?>>Islam</option>
                  <option value="Kristen" <?php if ($row['agama'] == 'Kristen') echo 'selected'; ?>>Kristen</option>
                  <option value="Katolik" <?php if ($row['agama'] == 'Katolik') echo 'selected'; ?>>Katolik</option>
                  <option value="Hindu" <?php if ($row['agama'] == 'Hindu') echo 'selected'; ?>>Hindu</option>
                  <option value="Buddha" <?php if ($row['agama'] == 'Buddha') echo 'selected'; ?>>Buddha</option>
                </select>
              </div>

              <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah:</label>
                <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" value="<?php echo $row['asal_sekolah']; ?>" required>
              </div>

              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="submit" value="Update" class="btn btn-primary">
            </form>
            <?php
        } else {
            echo '<p>Data tidak ditemukan.</p>';
        }
    } else {
        echo '<p>ID data tidak valid.</p>';
    }

    // Process the form submission to update data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $gender = $_POST['gender'];
        $agama = $_POST['agama'];
        $asal_sekolah = $_POST['asal_sekolah'];

        // Update data in the database based on the ID
        $sql = "UPDATE mahasiswa SET nama = '$nama', alamat = '$alamat', gender = '$gender', agama = '$agama', asal_sekolah = '$asal_sekolah' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            // Data updated successfully, redirect to index.php after a short delay
            echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 2000);</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
