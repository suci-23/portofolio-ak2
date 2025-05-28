<?php
$id_level = isset($_SESSION['LEVEL']) ? $_SESSION['LEVEL'] : '';
?>

<header class="shadow">
  <nav class="navbar navbar-expand-lg bg-body-white">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">CMS Suci</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Page
            </a>
            <ul class="dropdown-menu">
              <!-- JIKA LEVEL ADMIN = ADA HALAMAN USER -->
              <?php if ($id_level == 1): ?>
                <li><a class="dropdown-item" href="?page=users">User</a></li>
              <?php endif ?>

              <li><a class="dropdown-item" href="?page=manage-profile">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="?page=services">Services</a></li>
              <li><a class="dropdown-item" href="?page=contact">Contact</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=manage-skills">Skills</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=experiences">Experiences</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=educations">Educations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=summary">Summary</a>
          </li>
        </ul>

        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $_name ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="php/logout.php">Log Out</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>