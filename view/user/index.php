<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../../css/style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container cashier-navbar">
            <a class="navbar-brand" href="#">Latihan UKK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Teacher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-lg-0">
                    <li class="nav-item">
                        <a href="../../controller/Logout.php"><button class="btn btn-secondary">Log Out</button></a>
                </ul>
            </div>
        </div>
    </nav>
    <section class="header mt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 CopyWriting  align-self-center">
                    <div class="badge mb-10">
                        <img src="../../assets/icons8-student-50.png" class="icon" alt="">
                        <p class="small-copy">
                            Mari Melihat Data Siswa Dan Guru
                        </p>
                    </div>
                    <h1 class="big-header mb-10">
                        Data Guru <br> dan Data 
                        
                    </h1>
                    <p class="primary-copy mb-30">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Quisquam, voluptatum. Quisquam, voluptatum.
                    </p>
                    <a href="#" class="btn btn-primary mr-10">Lebih Lanjut</a>
                    <a href="#" class="btn btn-secondary">Tentang Kami</a>
                </div>
                <div class="col-lg-7">
                    <img src="../../assets/Banner-header.svg" class="img-banner img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="main" style="margin-top: 70px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
    <?php
    include "../../config/dbConnect.php";
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="../../function/CreateSiswa.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">id makanan</th>
          <th scope="col"> nama makanan</th>
          <th scope="col">stok</th>
          <th scope="col">deskripsi</th>
          <th scope="col">kategori</th>
          <th scope="col">kode makanan</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $sql = "SELECT * FROM `ukk_makanan`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row["id_pelanggan"] ?></td>
            <td><?php echo $row["nama_makanan"] ?></td>
            <td><?php echo $row["stok"] ?></td>
            <td><?php echo $row["deskripsi"] ?></td>
            <td><?php echo $row["kategori"] ?></td>
            <td><?php echo $row["kode_makanan"] ?></td>
            <td>
              <a href="../../function/EditSiswa.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="../../function/DeleteSiswa.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>