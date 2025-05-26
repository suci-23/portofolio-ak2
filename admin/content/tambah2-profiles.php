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
  $status = $_POST['status'];
  $size = $_FILES['photo']['size'];


  //PROSES SIMPAN FOTO
  $photo = $_FILES['photo']['name'];
  $tmp_name = $_FILES['photo']['tmp_name'];

  //ekstensi yg boleh diupload: .png, .jpg, .jpeg
  $ekstensi = array('png', 'jpg', 'jpeg');
  $filename = uniqid() . '_' . basename($photo);
  $filepath = 'uploads/' . $filename;

  //apakah user upload dgn ekstensi yg sesuai? YA, gambar masuk ke table dan folder. TIDAK, error: "Ekstensi tidak ada"
  //in_array = utk cek isi array ada nilai atau ga

  $ext = pathinfo($photo, PATHINFO_EXTENSION);

  if (!in_array($ext, $ekstensi)) {
    $error[] = "Ekstensi File Tidak Ada.";
  } else {
    move_uploaded_file($tmp_name, $filepath);
    unlink("uploads/" . $rowprofile['photo']);

    $query = mysqli_query($config, "INSERT INTO profiles (nm_profile, profession, email, phone, photo, description, status,tipe) VALUES ('$name', '$profession', '$email', '$phone', '$filename', '$description', '$status','pribadi')");
    if ($query) {
      header('location:?page=profile&tambah=berhasil');
    }
  }
}

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryedit = mysqli_query($config, "SELECT * FROM users WHERE id='$id_user'");
$rowedit = mysqli_fetch_assoc($queryedit);

//mencari, apakah di dlm tbl profiles ada datanya? YA, update. TIDAK, insert.
//mysqli_num_row()
// $queryprofile = mysqli_query($config, "SELECT * FROM profiles ORDER BY id DESC");
// if (mysqli_num_rows($queryprofile) > 0) {
//   $rowprofile = mysqli_fetch_assoc($queryprofile);
//   $id = $rowprofile['id'];

//   //jika user upload gambar
//   if (!empty($photo)) {
//     $filename = uniqid() . '_' . basename($photo['name']);
//     $filepath = 'uploads/' . $filename;
//     move_uploaded_file($photo['tmp_name'], $filepath);

//     $update = mysqli_query($config, "UPDATE profiles SET nm_profile='$nm_profile', profession='$profession', email='$email', phone='$phone', description='$description', photo = '$filename' WHERE id = '$id'");
//     header("location:?page=profile&edit=berhasil");
//   } else {
//     //perintah update
//     $update = mysqli_query($config, "UPDATE profiles SET nm_profile = '$nm_profile' WHERE id = '$id'");
//     header("location:?page=profile&tambah=berhasil");
//   }
// } else {

//   //perintah insert
//   if (!empty($photo)) {
//     //JIKA USER UPLOAD GAMBAR
//   } else {

//     //JIKA USSER TIDAK UPLOAD GAMBAR
//     $inputQ = mysqli_query($config, "INSERT INTO profiles (nm_profile, profession, email, phone, description) VALUES ('$nm_profile','$profession', '$email', '$phone', '$description')");
//     header("location:?page=manage-profile&ubah=berhasil");
//   }
// }

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
        value="<?= isset($rowedit['description']) ? $rowedit['description'] : ''; ?>"></textarea>
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