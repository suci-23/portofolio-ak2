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
          <th>Profession</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Photo</th>
          <th>Description</th>
          <th>Status</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($row as $key => $data): ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $data['nm_profile'] ?></td>
            <td><?= $data['profession'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['phone'] ?></td>
            <td><img width="100" src="uploads/<?= $data['photo'] ?>" alt=""></td>
            <td><?= $data['description'] ?></td>
            <td>
              <a href="?page=tambah-profiles&edit<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
              <a onclick="return confirm('Are You Sure?')" class="btn btn-warning btn-sm"
                href="?page=profile&delete=<?php echo $data['id'] ?>">Delete</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

</div>