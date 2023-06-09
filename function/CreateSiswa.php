<?php
include "../config/dbConnect.php";

if (isset($_POST["submit"])) {
   $id_pelanggan = $_POST['id_pelanggan'];
   $nama_makanan = $_POST['nama_makanan'];
   $stok = $_POST['stok'];
   $deskripsi = $_POST['deskripsi'];
   $kategori = $_POST['kategori'];
   $kode_makanan = $_POST['kode_makanan'];

   $sql = "INSERT INTO `ukk_makanan`(`id`,`id_pelanggan`,`nama_makanan`, `stok`, `deskripsi`, `kategori`,`kode_makanan`) VALUES (NULL,'$id_pelanggan','$nama_makanan','$stok','$deskripsi','$kategori','$kode_makanan')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: ../index.php?msg=New record created successfully");
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
   <div class="container ">
      <div class="text-center mb-4">
         <h3>Add New User</h3>
         <p class="text-muted">Complete the form below to add a new user</p>
      </div>

      <div class="container d-flex justify-content-center card-brand">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="form-group mb-3">
               <label>id_pelanggan:</label>
               <input type="number" class="form-control" name="id_pelanggan" placeholder="id_pelanggan">
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label"> nama makanan:</label>
                  <input type="text" class="form-control" name="nama_makanan" placeholder="Albert">
               </div>

               <div class="col">
                  <label class="form-label">stok:</label>
                  <input type="text" class="form-control" name="stok" placeholder="Einstein">
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">deskripsi:</label>
               <input type="text" class="form-control" name="deskripsi" placeholder="masukan deskripsi">
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