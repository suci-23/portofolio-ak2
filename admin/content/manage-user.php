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


//QUERY SIMPAN USERS
if (isset($_POST['simpan'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $id_level = $_POST['id_level'];
  $password = sha1($_POST['password']);

  $query = mysqli_query($config, "INSERT INTO users (name, email, password, id_level) VALUES ('$name', '$email', '$password', '$id_level')");
  if ($query) {
    header('location:?page=users&tambah=berhasil');
  }
}

//QUERY EDIT USERS
$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryedit = mysqli_query($config, "SELECT * FROM users WHERE id='$id_user'");

$rowedit = mysqli_fetch_assoc($queryedit);

if (isset($_POST['edit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $id_level = $_POST['id_level'];
  $password = sha1($_POST['password']);

  if (empty($_POST['password'])) {
    $password = $rowedit['password'];
  } else {
    $password = sha1($_POST['password']);
  }

  $queryUpdate = mysqli_query($config, "UPDATE users SET id_level = '$id_level', name = '$name', email = '$email', password = '$password' WHERE id='$id_user'");
  if ($queryUpdate) {
    header('location:?page=users&edit=berhasil');
  }
}

//QUERY LEVELS
$querylevels = mysqli_query($config, "SELECT * FROM levels ORDER BY id DESC");
$rowlevels = mysqli_fetch_all($querylevels, MYSQLI_ASSOC);
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
      <label for="">Level of Name *</label>
    </div>
    <div class="col-sm-10">
      <select name="id_level" class="form-control" id="">
        <option value="">Choose One:</option>

        <!-- DATA OPTION LEVEL DIAMBIL DARI DB TABLE LEVELS -->
        <?php foreach ($rowlevels as $level): ?>
          <option <?php echo isset($_GET['edit']) ? ($level['id']) == $rowedit['id_level'] ? 'selected' : '' : '' ?> value="<?php echo $level['id'] ?>"><?php echo $level['nm_level'] ?></option>
        <?php endforeach ?>
        <!-- END OPTION -->

      </select>
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
      <label for="">Password <?= isset($_GET['edit']) ? '' : '*'; ?></label>
    </div>
    <div class="col-sm-10">
      <input <?= isset($_GET['edit']) ? '' : 'required'; ?> type="password" name="password" class="form-control" placeholder="Your Password">
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-12">
      <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit"
        class="btn btn-primary">Save</button>
    </div>
  </div>
</form>