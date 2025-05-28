<?php
$query = mysqli_query($config, 'SELECT * FROM experiences ORDER BY id DESC');
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

//
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $queryhapus = mysqli_query($config, "DELETE FROM experiences WHERE id='$id'");

  header('location:?page=experiences&hapus=berhasil');
}
?>

<div class="card-body">
  <div class="table-responsive">
    <div align="right" class="mb-3">
      <a href="?page=manage-experience" class="btn btn-primary">ADD</a>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Position</th>
          <th>Company</th>
          <th>Location</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Description</th>
          <th>Status</th>

        </tr>
      </thead>

      <tbody>
        <?php foreach ($row as $key => $data): ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $data['position'] ?></td>
            <td><?= $data['company'] ?></td>
            <td><?= $data['location'] ?></td>
            <td><?= $data['start_date'] ?></td>
            <td><?= $data['end_date'] ?></td>
            <td><?= $data['description'] ?></td>
            <td>
              <a href="?page=manage-experience&edit=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
              <a onclick="return confirm('Are You Sure?')" class="btn btn-warning btn-sm"
                href="?page=experiences&delete=<?php echo $data['id'] ?>">Delete</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

</div>