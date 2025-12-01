<?php
// include;
// include_once;
// require_once;
// require;
// require_once 'config/koneksi.php';

$query = mysqli_query($config, "SELECT * FROM customers u ORDER BY u.id DESC");
$customers = mysqli_fetch_all($query, MYSQLI_ASSOC);

// disini parameter delete
// $_GET 
// isset, empty
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = mysqli_query($config, "DELETE FROM customers WHERE id = $id");
  // redirect
  header("location:?page=customer&hapus=berhasil");
}
?>

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Data Customer <i class="bi bi-people-fill"></i></h3>
        <div class="mb-3" align="right">
          <a href="?page=tambah-customer" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Customer
          </a>
          </a>
        </div>
        <table class="table table-bordered table-striped datatable">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Address</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($customers as $key => $value): ?>
              <tr>
                <td><?php echo $key += 1 ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['phone'] ?></td>
                <td><?php echo $value['address'] ?></td>
                <td>
                  <a class="btn btn-outline-warning btn-sm" href="?page=tambah-customer&edit=<?php echo $value['id'] ?>"><i class="bi bi-pencil-fill"></i></a>
                  <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"
                    href="?page=customer&delete=<?php echo $value['id'] ?>">
                    <i class="bi bi-trash-fill"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>