<?php
require_once "config/config.php";

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$selectLevel = mysqli_query($config, "SELECT name FROM levels WHERE id = '$id'");
$level = mysqli_fetch_assoc($selectLevel);

if (isset($_POST['simpan'])) {
  $name = $_POST['name'];
  $insert = mysqli_query($config, "INSERT INTO levels (name) VALUE ('$name')");

  header("location:?page=level");
}
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $update = mysqli_query($config, "UPDATE levels SET name='$name' WHERE id = '$id'");

  header('location:?page=level');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=
  , initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title" ><?php echo isset($_GET['edit']) ? 'Update' : 'Tambah '?> Level</h3>
          <div class="card-body">
            <form action="" method="post">
              <label for="" class="form-label">Level Name</label><br>
              <input type="text" class="form-control w-50" name="name" value="<?php echo $level['name'] ?? '' ?>" required><br>
              <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['edit']) ? 'update' : 'simpan' ?>"><?php echo isset($_GET['edit']) ? 'Edit' : 'Create' ?></button>
              <a href="?page=level" class="btn btn-secondary">Back</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>