<?php
$query = mysqli_query($config, 'SELECT * FROM services ORDER BY id DESC');
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

//
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $queryhapus = mysqli_query($config, "DELETE FROM services WHERE id='$id'");

  header('location:?page=services&hapus=berhasil');
}
?>

<div class="card-body">
  <div class="table-responsive">
    <div align="right" class="mb-3">
      <a href="?page=manage-service" class="btn btn-primary">ADD</a>
    </div>
    <table id="table" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Name of Service</th>
          <th>Details</th>
          <th>Status</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($row as $key => $data): ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $data['nm_service'] ?></td>
            <td><?= $data['description'] ?></td>
            <td>
              <a href="?page=manage-service&edit=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
              <a onclick="return confirm('Are You Sure?')" class="btn btn-warning btn-sm"
                href="?page=services&delete=<?php echo $data['id'] ?>">Delete</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

</div>