<?php
$query = mysqli_query($config, 'SELECT * FROM educations ORDER BY id DESC');
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

//
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $queryhapus = mysqli_query($config, "DELETE FROM educations WHERE id='$id'");

  header('location:?page=educations&hapus=berhasil');
}
?>

<div class="card-body">
  <div class="table-responsive">
    <div align="right" class="mb-3">
      <a href="?page=manage-education" class="btn btn-primary">ADD</a>
    </div>
    <table id="table" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Level of Degree</th>
          <th>Major</th>
          <th>School</th>
          <th>Start Year</th>
          <th>End Year</th>
          <th>Description</th>
          <th>Status</th>

        </tr>
      </thead>

      <tbody>
        <?php foreach ($row as $key => $data): ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $data['degree_level'] ?></td>
            <td><?= $data['major'] ?></td>
            <td><?= $data['school'] ?></td>
            <td><?= $data['start_year'] ?></td>
            <td><?= $data['end_year'] ?></td>
            <td><?= $data['description'] ?></td>
            <td>
              <a href="?page=manage-education&edit=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
              <a onclick="return confirm('Are You Sure?')" class="btn btn-warning btn-sm"
                href="?page=educations&delete=<?php echo $data['id'] ?>">Delete</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

</div>