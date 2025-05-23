<?php
include 'config/koneksi.php';

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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
  </script>
</head>

<body>
  <div class="wrapper">
    <header class="shadow">
      <nav class="navbar navbar-expand-lg bg-body-white">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CMS Suci</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Page
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user.php">User</a>
              </li>

            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="content mt-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <?= $header ?>
                Data User
              </div>
              <div class="card-body">
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

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
</body>

</html>