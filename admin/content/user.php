<?php
$query = mysqli_query($config, 'SELECT * FROM profiles ORDER BY id DESC');
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

//
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $queryhapus = mysqli_query($config, "DELETE FROM profiles WHERE id='$id'");

  header('?page=profiles&hapus=berhasil');
}
?>

<div class="card-body">
  <div class="table-responsive">
    <div align="right" class="mb-3">
      <a href="?page=tambah-profiles" class="btn btn-primary">ADD</a>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Current Profession</th>
          <th>Detail</th>
          <th>Status</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($row as $key => $data): ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $data['nm_profile'] ?></td>
            <td><?= $data['profession'] ?></td>
            <td><?= $data['status'] ?></td>
            <td>
              <a href="?page=manage-profile<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
              <a onclick="return confirm('Are You Sure?')" class="btn btn-warning btn-sm"
                href="user.php?delete=<?php echo $data['id'] ?>">Delete</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

</div>