<?php
  session_start();
  include "konek.php";
  if(!isset($_SESSION['login_nama'])){
  header("Location: regislogin.php");
  exit;
  }
  $nama = $_SESSION['login_nama'];
  // Memeriksa apakah parameter 'id' tersedia
  if (isset($_GET['id'])) {
      $id_buku = $_GET['id'];

      // Query untuk mendapatkan data buku berdasarkan id_buku
      $sql = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = '$id_buku'");
      $data = mysqli_fetch_array($sql);
  } else {
      echo "ID Buku tidak ditemukan.";
      exit;
  }
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
                Ubah Data         </div>
         <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="" method="post" enctype="multipart/form-data">
                       
                    <div class="form-group">
                            <label for="">judul</label>
                            <input type="text" class="form-control" placeholder="judul buku"style="margin-top:7px;margin-bottom:7px;" name="judul" value="<?php echo $data['judul']; ?>">

                        </div>
                    <div class="form-group">
                            <label for="">gambar</label>
                            <input type="file" class="form-control" placeholder="gambar"style="margin-top:7px;margin-bottom:7px;" name="gambar" value="<?php echo $data['gambar']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="">penerbit</label>
                            <input type="text" class="form-control" placeholder="nama penerbit"style="margin-top:7px;margin-bottom:7px;" name="penerbit" value="<?php echo $data['penerbit']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="">penulis</label>
                            <input type="text" class="form-control" placeholder="nama penulis"style="margin-top:7px;margin-bottom:7px;" name="penulis" value="<?php echo $data['penulis']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="">sinopsis</label>
                            <input type="text" class="form-control" placeholder="nama penulis"style="margin-top:7px;margin-bottom:7px;" name="sinopsis" value="<?php echo $data['sinopsis']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="">is_ready</label>
                            <input type="text" class="form-control" placeholder="apakah ready"style="margin-top:7px;margin-bottom:7px;" name="is_ready" value="<?php echo $data['is_ready']; ?>">

                        </div>
                        <input type="submit" name="ubah" class="btn btn-primary" value="ubah"style="margin-top:7px;margin-bottom:7px;">
                    </form>
                    <?php
                      include "konek.php";
                       if(isset($_POST['ubah'])){
                        $judul = $_POST['judul'];

                        $nama_file = $_FILES['gambar']['name'];
                        $source = $_FILES['gambar']['tmp_name'];
                        $folder = './upload/';
                        $penerbit = $_POST['penerbit'];
                        $penulis = $_POST['penulis'];
                        $sinopsis = $_POST['sinopsis'];
                        $is_ready = $_POST['is_ready'];
                        move_uploaded_file($source, $folder.$nama_file);

                     
                        $query = "UPDATE buku SET 
                        judul = '$judul', gambar = '$nama_file', penerbit = '$penerbit', 
                        penulis = '$penulis', sinopsis = '$sinopsis', is_ready = '$is_ready' 
                        WHERE id_buku = '$_GET[id]'";
              

                        mysqli_query($koneksi, $query);
                        echo '<script>
                        alert("Berhasil mengubah data buku!");  
                        window.location.href="tampilbuku.php";
                         </script>';
                       }
                    ?>
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
