<?php
    session_start();
    if(isset($_SESSION['login_nama'])){
        header("Location: dashboard.php");
        exit;
    }
    include "konek.php";
    if (isset($_POST["daftar"])) {
        $nama = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $insert = "INSERT INTO user (nama, email, username, password) VALUES('$nama', '$email', '$username', '$password')";
        $koneksi->query($insert);
   
        
    };

    if(isset($_POST['login'])){
        $username = $_POST["username"];
        $password = $_POST["password"];    
        
        $sql = "SELECT COUNT(*) as total FROM admin WHERE username = '$username'";
        $result = $koneksi->query($sql);

        // Mendapatkan hasil
        $row = $result->fetch_assoc();
        $totalData = $row['total'];

        $usql = "SELECT COUNT(*) as total FROM user WHERE username = '$username'";
        $hasil = $koneksi->query($usql);

        // Mendapatkan hasil
        $ambil = $hasil->fetch_assoc();
        $totalDataUser = $ambil['total'];

        $select = "SELECT * FROM admin WHERE username='$username'";
        $result = $koneksi->query($select);
        
        $uselect = "SELECT * FROM user WHERE username='$username'";
        $uhasil = $koneksi->query($uselect);

        if($totalData==1){
            while($ambil_data=$result->fetch_assoc()){
                if($password===$ambil_data['password']){
                    $_SESSION['login_id'] = $ambil_data['id_admin'];
                    $_SESSION['login_nama'] = $ambil_data['nama'];

                    header("Location: dashboard.php");
                    exit;
                }
            }
        } else if ($totalDataUser==1){
            while($ambil_data=$uhasil->fetch_assoc()){
                if($password===$ambil_data['password']){
                    $_SESSION['login_id'] = $ambil_data['id_user'];
                    $_SESSION['login_nama'] = $ambil_data['nama'];
                    $_SESSION['login_email'] = $ambil_data['email'];
                    $_SESSION['login_uname'] = $ambil_data['username'];
                    header("Location: user.php");
                    exit;
                }
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="regislogin.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" method="post" class="sign-in-form">
            <h2 class="title">Sign In</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" name="login" value="Sign In" class="btn solid" />
            <br>
            
            <a href="homepage.php" style="text-decoration:none;">Beranda</a>
          </form>
          <form action="" class="sign-up-form" method="post">
            <h2 class="title">Sign Up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="name" placeholder="Nama Lengkap" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" name="daftar"class="btn" value="Sign up" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>Terhubunglah dengan pengetahuan. Buat akun di e-Library sekarang!</p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
            
          </div>
          <img src="ilusbuk.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
            Jelajahi dunia pengetahuan. Masuk ke akun e-Library Anda sekarang!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="bukil.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="regislogin.js"></script>
  </body>
</html>