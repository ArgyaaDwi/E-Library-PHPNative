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
            <a href="#">
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
            <a href="logout.php"
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
            <div class="card-header">
             Data User
         </div>
         <div class="card-body">
            <div class="row">
                <div class="col">
                    <a href="adduser.php" class="btn btn-outline-primary">Tambah User</a>
                </div>
                <div class="col">
                <form class="d-flex" role="search" method="GET">
                   <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="keyword">
                   <input type="submit" class="btn btn-primary" type="submit" name="cari" value="Cari">
                </form>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;" >
                <div class="col">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>No</th>
                            <th>Id_user</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                            if(isset($_GET['cari'])){
                              $keyword=$_GET['keyword'];
                              $query=mysqli_query($koneksi, "SELECT * from user WHERE nama LIKE '%$keyword%'");

                            }else{
                              $query=mysqli_query($koneksi, "SELECT * from user");
                            }
                            $no=1;
                            while($ambil_data=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $ambil_data['id_user'];?></td>
                            <td><?php echo $ambil_data['nama'];?></td>
                            <td><?php echo $ambil_data['email'];?></td>
                            <td><?php echo $ambil_data['username'];?></td>
                            <td><?php echo $ambil_data['password'];?></td>
                            <td><a href="edituser.php?id=<?php echo $ambil_data['id_user']?>" class="btn btn-outline-success">Edit</a>  <a href="hapususer.php?id=<?php echo $ambil_data['id_user'];?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
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
