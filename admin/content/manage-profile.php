<?php
include 'config/koneksi.php';

if (isset($_POST['simpan'])) {
  $nm_profile = $_POST['nm_profile'];
  $profession = $_POST['profession'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $description = $_POST['description'];

  //SIMPAN FOTO
  $photo = $_FILES['photo']['name'];

  //mencari, apakah di dlm tbl profiles ada datanya? YA, update. TIDAK, insert.
  //mysqli_num_row()

  $queryprofile = mysqli_query($config, "SELECT * FROM profiles ORDER BY id DESC");
  if (mysqli_num_rows($queryprofile) > 0) {
    $rowprofile = mysqli_fetch_assoc($queryprofile);
    $id = $rowprofile['id'];
    //perintah update
    $update = mysqli_query($config, "UPDATE profiles SET nm_profile = '$nm_profile' WHERE id = '$id'");
    header("location:?page=manage-profile&tambah=berhasil");
  } else {
    //perintah insert
    if (!empty($photo)) {
      //jika user upload gambar
    } else {
      //jika user tidak upload gambar
      $inputQ = mysqli_query($config, "INSERT INTO profiles (nm_profile, profession, email, phone, description) VALUES ('$nm_profile','$profession', '$email', '$phone', '$description')");
      header("location:?page=manage-profile&ubah=berhasil");
    }
  }

  // if ($photo['error'] == 0) {
  //   $filename = uniqid() . '_' . basename($photo['name']);
  //   $filepath = 'uploads/' . $filename;
  //   move_uploaded_file($photo['tmp_name'], $filepath);

  //   $inputQ = mysqli_query($config, "INSERT INTO profiles (nm_profile, profession, description, photo) VALUES ('$nm_profile','$profession','$description','$filename')");
  // }

  // if ($inputQ) {
  //   // header('location:dashboard.php?level=' . base64_encode($_SESSION['LEVEL']) . '&page=manage-profile');
  // }
}


// if (isset($_GET['del'])) {
//   $idhapus = $_GET['del'];

//   $pilihphoto = mysqli_query($config, "SELECT photo FROM profiles WHERE id= $idhapus");
//   $rowphoto = mysqli_fetch_assoc($pilihphoto);
//   if (isset($rowphoto['photo'])) {
//     unlink('uploads/' . $rowphoto['photo']);
//   }

//   // if ($rowphoto && !empty($rowphoto['photo'])) {
//   //   $filepath = 'uploads/' . $rowphoto['photo'];
//   //   if (file_exists($filepath) && is_file($filepath)) {
//   //     unlink($filepath);
//   //   }
//   // }

//   // $delete = mysqli_query($config, "DELETE FROM profiles WHERE id=$idhapus");
//   // if ($delete) {
//   //   // header('location:dashboard.php?level=' . base64_encode($_SESSION['LEVEL']));
//   // }
// }
$pilihprofile = mysqli_query($config, "SELECT * FROM profiles");
$row = mysqli_fetch_assoc($pilihprofile);

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryedit = mysqli_query($config, "SELECT * FROM profiles WHERE id='$id_user'");
$rowedit = mysqli_fetch_assoc($queryedit);
?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="m-2" style="width: 55%;">
    <div class="mb-3">
      <label for="" class="form-label">Profile Name</label>
      <input type="text" class="form-control" name="nm_profile" placeholder="Your Name"
        value="<?php echo !isset($rowedit['nm_profile']) ? $rowedit['nm_profile'] : ''; ?>">
    </div>

    <div class="mb-3"><label for="" class="form-label">Profession</label>
      <input type="text" class="form-control" name="profession" placeholder="Your Placeholder"
        value="<?php echo isset($rowedit['profession']) ? $rowedit['profession'] : ''; ?>">
    </div>

    <div class="mb-3"><label for="" class="form-label">Email</label>
      <input type="text" class="form-control" name="email"
        value="<?php echo !isset($rowedit['email']) ? $rowedit['email'] : ''; ?>">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Phone</label>
      <input type="text" class="form-control" name="phone"
        value="<?php echo !isset($rowedit['phone']) ? $rowedit['phone'] : ''; ?>">
    </div>

    <div class="mb-3">
      <label for="floatingTextarea">Description</label>
      <textarea class="form-control"
        name="description"><?php echo !isset($rowedit['description']) ? $rowedit['description'] : ''; ?></textarea>
    </div>


    <label for="" class="form-label">Photo</label>
    <input type="file" name="photo" id="" class="form-control">
    <img src="uploads/<?php echo $row['photo'] ?>" class="img-fluid my-5" width="150">
    <br>
    <button type="submit" name="simpan" class="btn btn-primary mt-2">Save</button>

    <!-- <?php if (empty($row['nm_profile'])) {
          ?> -->
    <!-- <?php
          } else {
          ?>
      <a onclick="return confirm('YAKIN INGIN HAPUS?')" href="<?php echo $row['id'] ?>"
        class="btn btn-danger mt-auto">Delete</a>
    <?php
          }
    ?> -->

  </div>
</form>