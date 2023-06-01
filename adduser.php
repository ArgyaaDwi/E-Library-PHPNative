<?php
  session_start();
  include "konek.php";
  if(!isset($_SESSION['login_nama'])){
    header("Location: regislogin.php");
    exit;
  }
  $nama = $_SESSION['login_nama'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="dashboardcss.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    />

    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"
    />
    <title>Document</title>
  </head>
  <body>
    <nav>
      <div class="logo-name">
        <div class="logo-image">
          <img src="bukil.png" alt="" />
        </div>
        <span class="logo-name">e-Library</span>
      </div>

      <div class="menu-items">
        <ul class="nav-links">
          <li>
            <a href="dashboard.php">
              <i class="uil uil-airplay"></i>
              <span class="link-name">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="tampiluser.php">
              <i class="uil uil-users-alt"></i>
              <span class="link-name">Data User</span>
            </a>
          </li>
          <li>
            <a href="tampilbuku.php">
              <i class="uil uil-books"></i>
              <span class="link-name">Data Buku</span>
            </a>
          </li>
       
          <li>
            <a href="tampiltransaksi.php">
            <i class="uil uil-transaction"></i>              
            <span class="link-name">Transaksi</span>
            </a>
          </li>
        </ul>

        <ul class="logout-mod">
          <li>
            <a href="#"
              ><i class="uil uil-signout"></i>
              <span class="link-name">Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <section class="dashboard">
    <nav class="navbar bg-body-tertiary" id="navbar">
        <div class="container-fluid d-flex justify-content-end">
          <a href="" style="text-decoration:none;color:black;">
           <p style="text-decoration: none;font-size:18px;"><?php echo $nama; echo" | Admin";?></p>
          </a>
        </div>
      </nav>
    <div class="container">
        <div class="row" >
            <div class="col-lg-12 mt-5">
            <div class="card">
            <div class="card-header">Tambah Data</div>
         <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="simpanuser.php" method="post">
                        <div class="form-group">
                            <label for="">Id User</label>
                            <input type="text" class="form-control" placeholder="Masukkan Id User" style="margin-top:7px;margin-bottom:7px;" name="id_use">
                        </div>
                        <div class="form-group">
                            <label for="">Nama User</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama User"style="margin-top:7px;margin-bottom:7px;" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Email</label>
                            <input type="text" class="form-control" placeholder="Masukkan Alamat Email"style="margin-top:7px;margin-bottom:7px;" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" placeholder="Masukkan Username"style="margin-top:7px;margin-bottom:7px;" name="username">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" placeholder="Masukkan Password"style="margin-top:7px;margin-bottom:7px;" name="password">
                        </div>
                        <input type="submit" class="btn btn-primary" value="simpan"style="margin-top:7px;margin-bottom:7px;">
                    </form>
                </div>
            </div>
         </div>
            </div>
            </div>
        </div>
    </div>
    </section>
  </body>
</html>
