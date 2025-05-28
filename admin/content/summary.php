<?php
if ($_SESSION['LEVEL'] != 1) {
  // echo "<h1>Only Admin Can Access This Page!</h1>";
  // echo "<a href='dashboard.php' class='btn btn-warning>Go Back</a>";
  // die;
  header("location:dashboard.php?failed=access");
}

//jika user pencet tombol simpan
// ambil data dr inputan, email, nama, password
// masukan ke dlm tabel user (name, email, password), nilainya diambil dr masing" inputan


//QUERY SIMPAN SUMMARY
if (isset($_POST['simpan'])) {
  $name = $_POST['name'];
  $about = $_POST['about'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  $query = mysqli_query($config, "INSERT INTO summary (name, about, email, phone, address) VALUES ('$name', '$about', '$email', '$phone', '$address')");
  if ($query) {
    header('location:?page=summary&tambah=berhasil');
  }
}

//QUERY EDIT SUMMARY
$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryedit = mysqli_query($config, "SELECT * FROM summary WHERE id='$id'");

$rowedit = mysqli_fetch_assoc($queryedit);

if (isset($_POST['edit'])) {
  $name     = $_POST['name'];
  $about    = $_POST['about'];
  $email    = $_POST['email'];
  $phone    = $_POST['phone'];
  $address  = $_POST['address'];

  $queryUpdate = mysqli_query($config, "UPDATE summary SET name = '$name', about = '$about', email = '$email', phone = '$phone', address = '$address' WHERE id='$id'");
  if ($queryUpdate) {
    header('location:?page=summary&edit=berhasil');
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
      <label for="">About *</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" rows="4" name="about" class="form-control" placeholder="Simple About Yourself" value="<?= isset($rowedit['about']) ? $rowedit['about'] : ''; ?>">
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
      <label for="">Phone *</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" name="phone" class="form-control" placeholder="Phone Number"
        value="<?= isset($rowedit['phone']) ? $rowedit['phone'] : ''; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Address *</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" name="address" class="form-control" placeholder="Your Domicile"
        value="<?= isset($rowedit['address']) ? $rowedit['address'] : ''; ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-12">
      <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit"
        class="btn btn-primary">Save</button>
    </div>
  </div>
</form>