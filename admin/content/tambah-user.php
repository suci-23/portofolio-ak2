<?php
//jika user pencet tombol simpan
// ambil data dr inputan, email, nama, password
// masukan ke dlm tabel user (name, email, password), nilainya diambil dr masing" inputan

if (isset($_POST['simpan'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = sha1($_POST['password']);

  $query = mysqli_query($config, "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
  if ($query) {
    header('location:user.php?tambah=berhasil');
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

<form action="" method="post">
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Name *</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" name="name" class="form-control" placeholder="Your Name"
        value="<?= isset($rowedit['name']) ? $rowedit['name'] : ''; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Email *</label>
    </div>
    <div class="col-sm-10">
      <input required type="email" name="email" class="form-control" placeholder="Your Email"
        value="<?= isset($rowedit['email']) ? $rowedit['email'] : ''; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Password *</label>
    </div>
    <div class="col-sm-10">
      <input required type="password" name="password" class="form-control" placeholder="Your Password">
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-12">
      <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit"
        class="btn btn-primary">Save</button>
    </div>
  </div>
</form>