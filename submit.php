<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $agama = $_POST['agama'];
    $asal_sekolah = $_POST['asal_sekolah'];

    // Simpan data mahasiswa ke database atau file (atau lakukan tindakan lain sesuai kebutuhan)
    // ...

    // Tampilkan pesan sukses
    echo "Pendaftaran berhasil!";
}
?>
