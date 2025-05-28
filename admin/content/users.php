<?php

if ($_SESSION['LEVEL'] != 1) {
  // echo "<h1>Only Admin Can Access This Page!</h1>";
  // echo "<a href='dashboard.php' class='btn btn-warning>Go Back</a>";
  // die;
  header("location:dashboard.php?failed=access");
}


$query = mysqli_query($config, 'SELECT levels.nm_level, users.* FROM users LEFT JOIN levels ON levels.id = users.id_level ORDER BY users.id DESC');
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

//
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $queryhapus = mysqli_query($config, "DELETE FROM users WHERE id='$id'");
  header('location:?page=users&hapus=berhasil');
}
?>

<div class="card-body">
  <div class="table-responsive">
    <div align="right" class="mb-3">
      <a href="?page=manage-user" class="btn btn-primary">ADD</a>
    </div>
    <table id="table" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Name of Level</th>
          <th>Name</th>
          <th>Email</th>
          <th>Status</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($row as $key => $data): ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $data['nm_level'] ?></td>
            <td><?= $data['name'] ?></td>
            <td><?= $data['email'] ?></td>
            <td>
              <a href="?page=manage-user&edit=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
              <a onclick="return confirm('Are You Sure?')" class="btn btn-warning btn-sm"
                href="?page=users&delete=<?php echo $data['id'] ?>">Delete</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

</div>