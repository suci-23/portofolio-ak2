<?php
include 'config/koneksi.php';

//FUNGSI INSERT
if (isset($_POST['simpan'])) {
  $nm_profile = $_POST['nm_profile'];
  $profession = $_POST['profession'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $description = $_POST['description'];
  $status = $_POST['status'];
  $size = $_FILES['photo']['size'];

  //PROSES SIMPAN FOTO
  $photo = $_FILES['photo']['name'];
  $tmp_name = $_FILES['photo']['tmp_name'];
  $filename = uniqid() . "_" . basename($photo);
  $filepath = "uploads/" . $filename;

  //Cari, apakah di dlm table profiles ada datanya? YA, update... TIDAK, insert.
  $queryprofile = mysqli_query($config, "SELECT * FROM profiles ORDER BY id DESC");
  if (mysqli_num_rows($queryprofile) > 0) {
    $rowprofile = mysqli_fetch_assoc($queryprofile);
    $id = $rowprofile['id'];

    //Jika USER upload gambar
    if (!empty($photo)) {
      unlink("uploads/" . $rowprofile['photo']);
      move_uploaded_file($tmp_name, $filepath);

      $update = mysqli_query($config, "UPDATE profiles SET nm_profile='$nm_profile', profession='$profession',email='$email',phone='$phone', photo='$filename', description='$description' WHERE id = '$id'");
      header("location:?page=manage-profile&ubah=berhasil");
    } else {
      //Perintah Update
      $update = mysqli_query($config, "UPDATE profiles SET nm_profile='$nm_profile', profession='$profession',email='$email',phone='$phone', photo='$filename', description='$description' WHERE id = '$id'");
      header("location:?page=manage-profile&ubah=berhasil");
    }
  } else {
    //Perintah Insert
    if (!empty($photo)) {
      move_uploaded_file($tmp_name, $filepath);

      //JIKA USER UPLOAD GAMBAR
      $inputQ = mysqli_query($config, "INSERT INTO profiles (nm_profile, profession, email, phone, photo, description) VALUES ('$nm_profile','$profession', '$email', '$phone', '$filename', '$description')");
      header("location:?page=manage-profile&tambah=berhasil");
    } else {
      //JIKA USER TIDAK UPLOAD GAMBAR
      $inputQ = mysqli_query($config, "INSERT INTO profiles (nm_profile, profession, email, phone, description) VALUES ('$nm_profile','$profession', '$email', '$phone', '$description')");
      header("location:?page=manage-profile&tambah=berhasil");
    }
  }
}
$selectprofile = mysqli_query($config, "SELECT * FROM profiles");
$row = mysqli_fetch_assoc($selectprofile);

if (isset($_GET['del'])) {
  $idhapus = $_GET['del'];
  $selectphoto = mysqli_query($config, "SELECT photo FROM profiles WHERE id= $idhapus");
  $rowphoto = mysqli_fetch_assoc($selectphoto);

  unlink("uploads/" . $rowphoto['photo']);
  $delete = mysqli_query($config, "DELETE FROM profiles WHERE id= $idhapus");

  if ($delete) {
    header("location:?page=profiles&hapus=berhasil");
  }
}
?>


<form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Name *</label>
    </div>
    <div class="col-sm-10">
      <input required type="text" name="nm_profile" class="form-control" placeholder="Your Name"
        value="<?= isset($rowprofile['nm_profile']) ? $rowprofile['nm_profile'] : ''; ?>">
    </div>
  </div>

  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Profession *</label>
    </div>
    <div class="col-sm-10">
      <input required type="profession" name="profession" class="form-control" placeholder="Your profession"
        value="<?= isset($rowprofile['profession']) ? $rowprofile['profession'] : ''; ?>">
    </div>
  </div>

  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Email *</label>
    </div>
    <div class="col-sm-10">
      <input required type="email" name="email" class="form-control" placeholder="Your email"
        value="<?= isset($rowprofile['email']) ? $rowprofile['email'] : ''; ?>">
    </div>
  </div>

  <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Phone *</label>
    </div>
    <div class="col-sm-10">
      <input required type="phone" name="phone" class="form-control" placeholder="Your phone"
        value="<?= isset($rowprofile['phone']) ? $rowprofile['phone'] : ''; ?>">
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
      <label for="">Content *</label>
    </div>
    <div class="col-sm-10">
      <textarea id="summernote" type="description" name="description" class="form-control"
        placeholder="Your description" cols="30" rows="5"
        value="<?= isset($rowprofile['description']) ? $rowprofile['description'] : ''; ?>"></textarea>
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

  <!-- <div class="mb-3 row">
    <div class="col-sm-2">
      <label for="">Tipe</label>
    </div>
    <div class="col-sm-10">
      <input type="radio" name="status" value="pribadi" checked> Pribadi
      <input type="radio" name="status" value="skill"> Skill
    </div>
  </div> -->

  <div class="mb-3 row">
    <div class="col-sm-12">
      <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit"
        class="btn btn-primary">Save</button>
    </div>
  </div>
</form>