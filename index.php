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
  <!-- <link rel="stylesheet" href="./css/style.css"> -->
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

            <!-- Login -->
            <div class="modal fade" id="Login" aria-hidden="true" aria-labelledby="LoginLabel" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="--bs-modal-border-radius: 26px;">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="LoginLabel">Log in</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="./controller/LoginValidation.php" method="POST">
                      <div class="mb-3">

                        <label for="UsernameGithub" class="form-label">Username</label>
                        <?php
                        if (@isset($_GET['pesan'])) {
                          if (@$_GET['pesan'] == "gagal") {
                            echo "<script>alert('Username atau Password salah!');</script>";
                          }
                        } else if (@$_GET['pesan'] == "logout") {
                          echo "<script>alert('Anda telah berhasil logout');</script>";
                        }
                        ?>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan USername disini" id="exampleInputEmail1" aria-describedby="emailHelp" required />
                        <div id="emailHelp" class="form-text">
                          Diharapkan untuk memperhatikan besar kecilnya huruf
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="EmailGithub" class="form-label">Password</label>
                        <input href="" type="password" class="form-control" id="exampleInputPassword1" name="password" />
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <button class="btn btn-primary" data-bs-target="#Login" data-bs-toggle="modal">Log in</button>
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <!-- Register -->
            <?php
            require './config/dbConnect.php';

            error_reporting(0);

            session_start();

            if (isset($_SESSION['username'])) {
              header("Location: ./view/user/index.php");
            }

            if (isset($_POST['submit'])) {
              $username = $_POST['username'];
              $email = $_POST['email'];
              $password = $_POST['password'];
              $cpassword = $_POST['cpassword'];
              $level = 0;

              $cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
              if (mysqli_num_rows($cek) > 0) {
                echo "<script>alert('Username sudah terdaftar!');</script>";
              } else {
                if ($password == $cpassword) {
                  $password = md5($password);
                  $insert = mysqli_query($conn, "INSERT INTO user(username, email, password, level) VALUES('$username', '$email', '$password','$level')");
                  if ($insert) {
                    echo "<script>alert('Berhasil daftar!');</script>";
                  } else {
                    echo "<script>alert('Gagal daftar!');</script>";
                  }
                } else {
                  echo "<script>alert('Password tidak sama!');</script>";
                }
              }
            }
            ?>
            <div class="modal fade" id="Register" aria-hidden="true" aria-labelledby="RegisterLabel" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="--bs-modal-border-radius: 26px;">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="RegisterLabel">Register</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="POST">
                      <div class="mb-3">
                        <label for="UsernameGithub" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan USername disini" id="exampleInputEmail1" aria-describedby="emailHelp" required />
                      </div>
                      <div class="mb-3">
                        <label for="UsernameGithub" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan USername disini" id="exampleInputEmail1" aria-describedby="emailHelp" required />
                      </div>
                      <div class="mb-3">
                        <label for="EmailGithub" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" />
                      </div>
                      <div class="mb-3">
                        <label for="EmailGithub" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword" />
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Konfirmasi</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <button class="btn btn-secondary" data-bs-target="#Register" data-bs-toggle="modal">Register</button>
        </ul>
      </div>
    </div>
  </nav>
  <section class="header mt-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 CopyWriting  align-self-center">
          <div class="badge mb-10">
            <img src="./assets/icons8-student-50.png" class="icon" alt="">
            <p class="small-copy">
              Mari Melihat Data Siswa Dan Guru
            </p>
          </div>
          <h1 class="big-header mb-10">
            Data Guru <br> dan Data Siswa
          </h1>
          <p class="primary-copy mb-30">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Quisquam, voluptatum. Quisquam, voluptatum.
          </p>
          <a href="#" class="btn btn-primary mr-10">Lebih Lanjut</a>
          <a href="#" class="btn btn-secondary">Tentang Kami</a>
        </div>
        <div class="col-lg-7">
          <img src="./assets/Banner-header.svg" class="img-banner img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>
  <!-- <section class="companies mt-70">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-12">
          <h3 class="medium-header mb-10">
            Dipercayai oleh Sekolah dan Organisasi
          </h3>
          <p class="primary-copy mb-30">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          </p>
        </div>
      </div>
    </div>
    <div class="carousel mb-20">
      <div class="carousel-wrapper">
        <div class="card-brand mr-30">
          <img src="./assets/Logo (1).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (2).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (3).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (4).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (5).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (6).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (7).png" class="logo" alt="">
        </div>
      </div>
      <div class="carousel-wrapper">
        <div class="card-brand mr-30">
          <img src="./assets/Logo (1).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (2).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (3).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (4).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (5).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (6).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (7).png" class="logo" alt="">
        </div>
      </div>
    </div>
    <div class="carousel-left">
      <div class="carousel-wrapper-left">
        <div class="card-brand mr-30">
          <img src="./assets/Logo (1).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (2).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (3).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (4).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (5).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (6).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (7).png" class="logo" alt="">
        </div>
      </div>
      <div class="carousel-wrapper-left">
        <div class="card-brand mr-30">
          <img src="./assets/Logo (1).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (2).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (3).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (4).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (5).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (6).png" class="logo" alt="">
        </div>
        <div class="card-brand mr-30">
          <img src="./assets/Logo (7).png" class="logo" alt="">
        </div>
      </div>
    </div>
  </section> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>