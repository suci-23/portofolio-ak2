<?php
include 'config/koneksi.php';

if (isset($_POST['simpan'])) {
  $nm_profile = $_POST['nm_profile'];
  $profession = $_POST['profession'];
  $description = $_POST['description'];
  $photo = $_FILES['photo'];

  if ($photo['error'] == 0) {
    $filename = uniqid() . '_' . basename($photo['name']);
    $filepath = 'uploads/' . $filename;
    move_uploaded_file($photo['tmp_name'], $filepath);

    $inputQ = mysqli_query($config, "INSERT INTO profiles (nm_profile, profession, description, photo) VALUES ('$nm_profile','$profession','$description','$filename')");
  }

  if ($inputQ) {
    // header('location:dashboard.php?level=' . base64_encode($_SESSION['LEVEL']) . '&page=manage-profile');
  }
}


if (isset($_GET['del'])) {
  $idhapus = $_GET['del'];

  $pilihphoto = mysqli_query($config, "SELECT photo FROM profiles WHERE id= $idhapus");
  $rowphoto = mysqli_fetch_assoc($pilihphoto);
  if (isset($rowphoto['photo'])) {
    unlink('uploads/' . $rowphoto['photo']);
  }

  // if ($rowphoto && !empty($rowphoto['photo'])) {
  //   $filepath = 'uploads/' . $rowphoto['photo'];
  //   if (file_exists($filepath) && is_file($filepath)) {
  //     unlink($filepath);
  //   }
  // }

  $delete = mysqli_query($config, "DELETE FROM profiles WHERE id=$idhapus");
  if ($delete) {
    // header('location:dashboard.php?level=' . base64_encode($_SESSION['LEVEL']));
  }
}
$pilihprofile = mysqli_query($config, "SELECT * FROM profiles");
$row = mysqli_fetch_assoc($pilihprofile);
?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="m-2" style="width: 55%;">
    <label for="" class="form-label">Profile Name</label>
    <input type="text" class="form-control" name="nm_profile"
      value="<?php echo isset($row['nm_profile']) ? $row['nm_profile'] : ''; ?>">

    <label for="" class="form-label">Profession</label>
    <input type="text" class="form-control" name="profession"
      value="<?php echo isset($row['profession']) ? $row['profession'] : ''; ?>">

    <label for="floatingTextarea">Description</label>
    <textarea class="form-control"
      name="description"><?php echo isset($row['description']) ? $row['description'] : ''; ?></textarea>

    <label for="" class="form-label">Photo</label>
    <input type="file" name="photo" id="" class="form-control">
    <img src="uploads/<?php echo $row['photo'] ?>" class="img-fluid my-5" width="150">
    <br>
    <?php if (empty($row['nm_profile'])) {
    ?>
      <button type="submit" name="simpan" class="btn btn-primary mt-2">Save</button>
    <?php
    } else {
    ?>
      <a onclick="return confirm('YAKIN INGIN HAPUS?')"
        href="dashboard.php?level=<?php echo base64_encode($_SESSION['LEVEL']) ?>&page=manage-profile&del=<?php echo $row['id'] ?>"
        class="btn btn-danger mt-auto">Delete</a>
    <?php
    }
    ?>

  </div>
</form>