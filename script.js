function validateForm() {
  var nama = document.getElementById("nama").value;
  var alamat = document.getElementById("alamat").value;
  var gender = document.getElementById("gender").value;
  var agama = document.getElementById("agama").value;
  var asal_sekolah = document.getElementById("asal_sekolah").value;

  if (nama == "" || alamat == "" || gender == "" || agama == "" || asal_sekolah == "") {
    alert("Silakan lengkapi semua field");
    return false;
  }

  return true;
}
