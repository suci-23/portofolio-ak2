<?php
//jika user pencet tombol simpan
// ambil data dr inputan, email, nama, password
// masukan ke dlm tabel user (name, email, password), nilainya diambil dr masing" inputan

if (isset($_POST['simpan'])) {
  $nm_service = $_POST['nm_service'];
  $description = $_POST['description'];

  $query = mysqli_query($config, "INSERT INTO services (nm_service, description) VALUES ('$nm_service', '$description')");
  if ($query) {
    header('location:?page=services&tambah=berhasil');
  }
}

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryedit = mysqli_query($config, "SELECT * FROM services WHERE id='$id'");
$rowedit = mysqli_fetch_assoc($queryedit);

if (isset($_POST['edit'])) {
  $nm_service = $_POST['nm_service'];
  $description = $_POST['description'];

  $queryUpdate = mysqli_query($config, "UPDATE services SET nm_service = '$nm_service', description = '$description' WHERE id='$id'");
  if ($queryUpdate) {
    header('location:?page=services&edit=berhasil');
  }
}

?>

<form action="" method="post">
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Name of Service*</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" name="nm_service" class="form-control" placeholder="Your Name"
        value="<?= isset($rowedit['nm_service']) ? $rowedit['nm_service'] : ''; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Description*</label>
    </div>
    <div class="col-sm-10">
      <textarea required type="text" name="description" class="form-control" placeholder="Details of Service" cols="30"
        rows="5" value="<?= isset($rowedit['description']) ? $rowedit['description'] : ''; ?>"></textarea>
    </div>
  </div>

  <div class="mb-3 row">
    <div class="col-sm-12">
      <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit"
        class="btn btn-primary">Save</button>
    </div>
  </div>
</form>