<?php
//jika user pencet tombol simpan
// ambil data dr inputan, email, nama, password
// masukan ke dlm tabel user (name, email, password), nilainya diambil dr masing" inputan

if (isset($_POST['simpan'])) {
  $degree_level = $_POST['degree_level'];
  $major = $_POST['major'];
  $school = $_POST['school'];
  $start_year = $_POST['start_year'];
  $end_year = $_POST['end_year'];
  $description = $_POST['description'];

  $query = mysqli_query($config, "INSERT INTO educations (degree_level, major, school, start_year, end_year, description) VALUES ('$degree_level', '$major', '$school', '$start_year', '$end_year', '$description')");
  if ($query) {
    header('location:?page=educations&tambah=berhasil');
  }
}

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryedit = mysqli_query($config, "SELECT * FROM educations WHERE id='$id'");
$rowedit = mysqli_fetch_assoc($queryedit);

if (isset($_POST['edit'])) {
  $degree_level = $_POST['degree_level'];
  $major = $_POST['major'];
  $school = $_POST['school'];
  $start_year = $_POST['start_year'];
  $end_year = $_POST['end_year'];
  $description = $_POST['description'];

  $queryUpdate = mysqli_query($config, "UPDATE educations SET degree_level = '$degree_level', major = '$major', school = '$school', start_year = '$start_year', end_year = '$end_year', description = '$description' WHERE id='$id'");
  if ($queryUpdate) {
    header('location:?page=educations&edit=berhasil');
  }
}

?>

<form action="" method="post">
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Level of Degree *</label>
    </div>
    <div class="col-sm-3">
      <select name="degree_level" class="form-control" id="">
        <option>Choose Degree</option>
        <option value="S3" <?= (isset($rowedit['degree_level']) && $rowedit['degree_level'] == 's3') ? 'selected' : '' ?>>S3</option>
        <option value="S2" <?= (isset($rowedit['degree_level']) && $rowedit['degree_level'] == 's2') ? 'selected' : '' ?>>S2</option>
        <option value="S1" <?= (isset($rowedit['degree_level']) && $rowedit['degree_level'] == 's1') ? 'selected' : '' ?>>S1</option>
        <option value="D3" <?= (isset($rowedit['degree_level']) && $rowedit['degree_level'] == 'd3') ? 'selected' : '' ?>>D3</option>
        <option value="D2" <?= (isset($rowedit['degree_level']) && $rowedit['degree_level'] == 'd2') ? 'selected' : '' ?>>D2</option>
        <option value="D1" <?= (isset($rowedit['degree_level']) && $rowedit['degree_level'] == 'd1') ? 'selected' : '' ?>>D1</option>
        <option value="SMA" <?= (isset($rowedit['degree_level']) && $rowedit['degree_level'] == 'sma') ? 'selected' : '' ?>>SMA / SMK</option>
        <option value="SMP" <?= (isset($rowedit['degree_level']) && $rowedit['degree_level'] == 'smp') ? 'selected' : '' ?>>SMP</option>
        <option value="SD" <?= (isset($rowedit['degree_level']) && $rowedit['degree_level'] == 'sd') ? 'selected' : '' ?>>SD</option>
      </select>
    </div>
  </div>

  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Major *</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" name="major" class="form-control" placeholder="Your major"
        value="<?= isset($rowedit['major']) ? $rowedit['major'] : ''; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">School *</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" name="school" class="form-control" placeholder="Your school"
        value="<?= isset($rowedit['school']) ? $rowedit['school'] : ''; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Start Year *</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" name="start_year" class="form-control" placeholder="Your start_year"
        value="<?= isset($rowedit['start_year']) ? $rowedit['start_year'] : ''; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">End Year *</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" name="end_year" class="form-control" placeholder="Your end_year"
        value="<?= isset($rowedit['end_year']) ? $rowedit['end_year'] : ''; ?>">
    </div>
  </div>

  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Description*</label>
    </div>
    <div class="col-sm-10">
      <textarea required type="text" name="description" class="form-control" placeholder="Details of Service" cols="30"
        rows="5" value=""><?= isset($rowedit['description']) ? $rowedit['description'] : ''; ?></textarea>
    </div>
  </div>

  <div class="mb-3 row">
    <div class="col-sm-12">
      <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit"
        class="btn btn-primary">Save</button>
    </div>
  </div>
</form>