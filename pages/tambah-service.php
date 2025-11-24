<?php

//PRODUCTS : 
$id   = isset($_GET['edit']) ? $_GET['edit'] : '';
$services  = mysqli_query($config, "SELECT * FROM services WHERE id = '$id' ");
$s  = mysqli_fetch_assoc($services);
// var_dump($product);

if (isset($_POST['simpan'])) {
  $name         = $_POST['name'];
  $price        = $_POST['price'];
  $description  = $_POST['description'];

  $insertService  = mysqli_query($config, "INSERT INTO services (name, price, description) VALUES ('$name', '$price', '$description')" );

  if ($insertService) {
    header("location:?page=service");
  }
}

if (isset($_POST['update'])) {
  $id           = $_GET['edit'];
  $name         = $_POST['name'];
  $price        = $_POST['price'];
  $description  = $_POST['description'];
  $update         = mysqli_query($config, "UPDATE services SET name='$name', price='$price', description='$description' WHERE id = $id");
  if ($update) {
    header("location:?page=service");
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Service</h3>
    </div>
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="w-50">
          <label for="" class="form-label">Service Name</label>
            <input class="form-control" value="<?php echo $s['name'] ?? '' ?>" type="text" name="name" required>
          <label for="" class="form-label">Price</label>
          <input class="form-control" value="<?php echo $p ? intval($s['price']) : '' ?>" type="number" name="price" required>

          <label for="" class="form-label">Description</label>
          <textarea class="form-control" name="description" cols="30" rows="5" required>
            <?php echo $s['description'] ?? '' ?>
          </textarea>
          <button type="submit" name="<?php echo isset($_GET['edit']) ? 'update' : 'simpan' ?>" class="btn btn-primary mt-2">
            <?php echo isset($_GET['edit']) ? 'Edit' : 'ADD' ?></button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>