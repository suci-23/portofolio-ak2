<?php
//jika user pencet tombol simpan
// ambil data dr inputan, email, nama, password
// masukan ke dlm tabel user (name, email, password), nilainya diambil dr masing" inputan

if (isset($_POST['simpan'])) {
  $position = $_POST['position'];
  $company = $_POST['company'];
  $location = $_POST['location'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $description = $_POST['description'];

  $query = mysqli_query($config, "INSERT INTO experiences (position, company, location, start_date, end_date, description) VALUES ('$position', '$company', '$location', '$start_date', '$end_date', '$description')");
  if ($query) {
    header('location:?page=experiences&tambah=berhasil');
  }
}

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryedit = mysqli_query($config, "SELECT * FROM experiences WHERE id='$id'");
$rowedit = mysqli_fetch_assoc($queryedit);

if (isset($_POST['edit'])) {
  $position = $_POST['position'];
  $company = $_POST['company'];
  $location = $_POST['location'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $description = $_POST['description'];

  $queryUpdate = mysqli_query($config, "UPDATE experiences SET position = '$position', company = '$company', location = '$location', start_date = '$start_date', end_date = '$end_date', description = '$description' WHERE id='$id'");
  if ($queryUpdate) {
    header('location:?page=experiences&edit=berhasil');
  }
}

?>

<form action="" method="post">
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Position*</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" name="position" class="form-control" placeholder="Your position"
        value="<?= isset($rowedit['position']) ? $rowedit['position'] : ''; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Company*</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" name="company" class="form-control" placeholder="Your company"
        value="<?= isset($rowedit['company']) ? $rowedit['company'] : ''; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Location*</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" name="location" class="form-control" placeholder="Your domicile"
        value="<?= isset($rowedit['location']) ? $rowedit['location'] : ''; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Start Date *</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" name="start_date" class="form-control" placeholder="Ex: (Juni 2020)"
        value="<?= isset($rowedit['start_date']) ? $rowedit['start_date'] : ''; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">End Date *</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" name="end_date" class="form-control" placeholder="Ex: (Agustus 2023)"
        value="<?= isset($rowedit['end_date']) ? $rowedit['end_date'] : ''; ?>">
    </div>
  </div>

  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Description*</label>
    </div>
    <div class="col-sm-10">
      <textarea id="summernote" type="description" name="description" class="form-control"
        placeholder="Your description" cols="30" rows="5"><?= isset($rowedit['description']) ? $rowedit['description'] : ''; ?></textarea>
    </div>
  </div>

  <div class="mb-3 row">
    <div class="col-sm-12">
      <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit"
        class="btn btn-primary">Save</button>
    </div>
  </div>
</form>