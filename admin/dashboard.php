<?php
session_start();
ob_start();

$_name = isset($_SESSION['NAME']) ? $_SESSION['NAME'] : '';

if (!$_name) {
  header('Location: index.php?access=failed');
}

include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
  </script>
</head>

<body>
  <div class="wrapper">
    <?php include 'inc/header.php'; ?>
    <div class="content mt-5">
      <div class="container">
        <div class="row-justify-content-center">

          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <?php echo isset($_GET['page']) ? str_replace('-', ' ', ucfirst($_GET['page'])) : 'HOME' ?>
              </div>
              <div class="card-body">
                <?php
                if (isset($_GET['page'])) {
                  //jika file ada
                  if (file_exists('content/' . $_GET['page'] . '.php')) {
                    include('content/' . $_GET['page'] . '.php');
                  } else {
                    include 'content/notfound.php'; //jika file tidak ada
                  }
                } else {
                  include 'content/home.php'; //jika file tidak ada ver.2
                }
                ?>
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