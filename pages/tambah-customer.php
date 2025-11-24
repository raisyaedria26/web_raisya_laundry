<?php


$id        = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM customers WHERE id='$id'");
$rowEdit   = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['update'])) {
  // $_POST
  $name     = $_POST['name'];
  $phone    = $_POST['phone'];
  $address = $_POST['address'];

  if ($address) {
    $query  = mysqli_query($config, "UPDATE customers
    SET name='$name', phone='$phone', address='$address' WHERE id='$id'");
  } else {
    $query  = mysqli_query($config, "UPDATE customers
    SET name='$name', phone='$phone' WHERE id='$id'");
  }

  // $edited = mysqli_query($config, $query);

  if ($query) {
    header("location:?page=customer&ubah=berhasil");
  }
}

if (isset($_POST['simpan'])) {
  $name    = $_POST['name'];
  $phone   = $_POST['phone'];
  $address = $_POST['address'];

  $query = mysqli_query(
    $config,
    "INSERT INTO customers (name, phone, address) 
        VALUES ('$name','$phone','$address')"
  );

  if ($query) {
    header("location:?page=customer&=berhasil");
  }
}

// echo "<pre>";
// print_r($rowEdit);
// echo "</pre>";
?>


<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">
          <?php echo isset($_GET['edit']) ? 'Edit' : 'Add' ?> Customer
        </h3>
        <form action="" method="post">
          <div class="mb-3">
            <label for="" class="form-label">Name *</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required value="<?php echo $rowEdit['name'] ?? ''  ?>">
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone *</label>
            <input type="number" name="phone" class="form-control" placeholder="Enter your phone" required value="<?php echo $rowEdit['phone'] ?? '' ?>">
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Address * <small>Kosongkan jika tidak ingin mengubah</small></label>
            <br>
            <input type="text" name="address" class="form-control" placeholder="Enter your address" value="<?php echo $rowEdit['address'] ?? '' ?>">
          </div>
          <br>
          <div class="mb-3">
            <button class="btn btn-primary" type="submit" name="<?= $id ? 'update' : 'simpan' ?>">
              <?= $id ? 'Simpan perubahan' : 'Simpan' ?>
            </button>
            <a href="?page=customer" class="btn btn-secondary">Back</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>