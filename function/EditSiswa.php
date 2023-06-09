<?php
include "../config/dbConnect.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $id_makanan = $_POST['id_makanan'];
  $nama_makanan = $_POST['nama_makanan'];
  $stok = $_POST['stok'];
  $deskripsi = $_POST['deskripsi'];
  $kategori = $_POST['kategori'];
  $kode_makanan = $_POST['kode_makanan'];

  $sql = "UPDATE `ukk_makanan` SET `id_pelanggan`= '$id_makanan', `nama_makanan`='$nama_makanan',`stok`='$stok',`deskripsi`='$deskripsi',`kategori`='$kategori', `kode_makanan`='$kode_makanan' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: ../index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PHP CRUD Application</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    PHP Complete CRUD Application
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `ukk_makanan` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

<div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="form-group mb-3">
               <label>id makanan</label>
               <input type="number" class="form-control" name="id_makanan" placeholder="id makanan" value="<?php echo $row['id_pelanggan']  ?>">
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label"> nama makanan:</label>
                  <input type="text" class="form-control" name="nama_makanan" placeholder="Albert" value="<?php echo $row['nama_makanan'] ?>">
               </div>

               <div class="col">
                  <label class="form-label">stok:</label>
                  <input type="text" class="form-control" name="stok" placeholder="Einstein" value="<?php echo $row['stok'] ?>">
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">deskripsi:</label>
               <input type="deskripsi" class="form-control" name="deskripsi" placeholder="name@example.com" value="<?php echo $row['deskripsi'] ?>">
            </div>

            <div class="mb-3">
               <label class="form-label">Kategori:</label>
               <input type="text" class="form-control" name="kategori" placeholder="masukan kategori">
            </div>

            <div class="mb-3">
               <label class="form-label">Kode Makanan:</label>
               <input type="text" class="form-control" name="kode_makanan" placeholder="masukan Kode Makanan">
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="../index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>