<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
  <title>List Pendaftaran Mahasiswa</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="mb-4">List Pendaftaran Mahasiswa</h1>
    <a href="create.php" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Tambah Data</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Jenis Kelamin</th>
          <th>Agama</th>
          <th>Sekolah Asal</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once('function.php');

        $sql = "SELECT * FROM mahasiswa";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $no . '</td>';
                echo '<td>' . $row['nama'] . '</td>';
                echo '<td>' . $row['alamat'] . '</td>';
                echo '<td>' . $row['gender'] . '</td>';
                echo '<td>' . $row['agama'] . '</td>';
                echo '<td>' . $row['asal_sekolah'] . '</td>';
                echo '<td>';
               // echo '<a href="update.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm mr-2"><i class="fas fa-edit"></i> Edit</a>';
               // echo '<a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>';
                echo '</td>';
                echo '</tr>';
                $no++;
            }
        } else {
            echo '<tr><td colspan="7" class="text-center">No registrations found.</td></tr>';
        }

        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
