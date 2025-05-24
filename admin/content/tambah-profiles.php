<?php
include 'config/koneksi.php';
//jika profiles pencet tombol simpan
// ambil data dr inputan, email, nama, password
// masukan ke dlm tabel profiles (name, email, password), nilainya diambil dr masing" inputan

if (isset($_POST['simpan'])) {
  $name = $_POST['nm_profile'];
  $profession = $_POST['profession'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $description = $_POST['description'];
  $photo = $_FILES['photo']['name'];
  $status = $_POST['status'];
  $size = $_FILES['photo']['size'];

  //ekstensi yg boleh diupload: .png, .jpg, .jpeg
  $ekstensi = array('png', 'jpg', 'jpeg');

  //apakah user upload dgn ekstensi yg sesuai? YA, gambar masuk ke table dan folder. TIDAK, error: "Ekstensi tidak ada"
  //in_array = utk cek isi array ada nilai atau ga

  $ext = pathinfo($photo, PATHINFO_EXTENSION);

  if (in_array($ext, $ekstensi)) {
    $error[] = "Ekstensi File Tidak Ada.";
  } else {
    $query = mysqli_query($config, "INSERT INTO profiles (nm_profile, profession, email, phone, description, photo, status) VALUES ('$name', '$profession', '$email', '$phone', '$description', '$photo', '$status')");
    if ($query) {
      header('location:?page=user&tambah=berhasil');
    }
  }
}

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryedit = mysqli_query($config, "SELECT * FROM users WHERE id='$id_user'");
$rowedit = mysqli_fetch_assoc($queryedit);

if (isset($_POST['edit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = sha1($_POST['password']);

  $queryUpdate = mysqli_query($config, "UPDATE users SET name = '$name', email = '$email', password = '$password' WHERE id='$id_user'");
  if ($queryUpdate) {
    header('location:user.php?edit=berhasil');
  }
}

?>

<!--  -->
<form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Name *</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" name="nm_profile" class="form-control" placeholder="Your Name"
        value="<?= isset($rowedit['nm_profile']) ? $rowedit['nm_profile'] : ''; ?>">
    </div>
  </div>

  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Profession *</label>
    </div>
    <div class="col-sm-10">
      <input required type="profession" name="profession" class="form-control" placeholder="Your profession"
        value="<?= isset($rowedit['profession']) ? $rowedit['profession'] : ''; ?>">
    </div>
  </div>

  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Email *</label>
    </div>
    <div class="col-sm-10">
      <input required type="email" name="email" class="form-control" placeholder="Your email"
        value="<?= isset($rowedit['email']) ? $rowedit['email'] : ''; ?>">
    </div>
  </div>

  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Phone *</label>
    </div>
    <div class="col-sm-10">
      <input required type="phone" name="phone" class="form-control" placeholder="Your phone"
        value="<?= isset($rowedit['phone']) ? $rowedit['phone'] : ''; ?>">
    </div>
  </div>

  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Details *</label>
    </div>
    <div class="col-sm-10">
      <input required type="description" name="description" class="form-control" placeholder="Your description"
        value="<?= isset($rowedit['description']) ? $rowedit['description'] : ''; ?>">
    </div>
  </div>


  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Photo</label>
    </div>
    <div class="col-sm-10">
      <input type="file" name="photo">
    </div>
  </div>

  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Status</label>
    </div>
    <div class="col-sm-10">
      <input type="radio" name="status" value="1" checked> Publish
      <input type="radio" name="status" value="0"> Draft
    </div>
  </div>

  <div class="mb-3 row">
    <div class="col-sm-12">
      <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit"
        class="btn btn-primary">Save</button>
    </div>
  </div>
</form>