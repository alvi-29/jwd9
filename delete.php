<!-- delete.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Hapus Data Mahasiswa</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1>Hapus Data Mahasiswa</h1>
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
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $row['nama']; ?>" readonly>
              </div>

              <!-- Other form fields with data display -->

              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="submit" value="Hapus" class="btn btn-danger" onclick="return confirmDelete();">
            </form>
            <?php
        } else {
            echo '<p>Data tidak ditemukan.</p>';
        }
    } else {
        echo '<p>ID data tidak valid.</p>';
    }

    // Process the form submission to delete data
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $id = $_POST['id'];

        // Delete data from the database based on the ID
        $sql = "DELETE FROM mahasiswa WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            // Data berhasil dihapus, lakukan pengalihan halaman ke index.php setelah penundaan beberapa saat
            echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 2000);</script>";
        } else {
            echo "Error deleting registration: " . $conn->error;
        }
    }

    $conn->close();
    ?>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    function confirmDelete() {
      return confirm('Apakah Anda yakin ingin menghapus data ini?');
    }
  </script>
</body>
</html>
