<?php
  session_start();
  include "konek.php";
  if(!isset($_SESSION['login_nama'])){
    header("Location: regislogin.php");
    
    exit;
  }
  $nama = $_SESSION['login_nama'];
  $queryuser = "SELECT COUNT(*) as jumlah FROM user";
  $resultuser = $koneksi->query($queryuser);
  $querybuku = "SELECT COUNT(*) as jumlah FROM buku";
  $resultbuku = $koneksi->query($querybuku);
  $querytransaksi = "SELECT COUNT(*) as jumlah FROM transaksi WHERE is_confirm=true";
  $query=mysqli_query($koneksi, "SELECT * FROM transaksi WHERE is_confirm=true ORDER BY tgl_pinjam DESC LIMIT 5;");

  $resulttransaksi = $koneksi->query($querytransaksi);
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
      <div id="title-container">
        <p id="title" style="margin-top: 30px; margin-bottom: 30px">
          <i class="uil uil-tachometer-fast-alt" style="font-size: 25px"></i>
          Dashboard
        </p>
      </div>
    
      <div class="row row-cols-1 row-cols-md-3 g-4" id="total-container">
        <div class="col">
          <div class="card" id="card-card-total" style=" box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);">
            <div
              class="card-body"
              id="card-total"
              style="border-left: 4px solid #0b1354"
            >
              <i class="uil uil-users-alt" style="font-size: 25px"></i>
            <?php
              while($ambil_data=$resultuser->fetch_assoc()){

              
            ?>
              <p class="card-title" id="total-title">Data User</p>
              <p class="card-text">Total <?php echo $ambil_data['jumlah'];?> User</p>
              <button
                type="submit"
                style="
                  background-color: #0b1354;
                  color: white;
                  border: none;
                  border-radius: 10px;
                  padding: 12px;
                  font-size: 10px;
                "
              >
              <a
                  href="tampiluser.php"
                  style="color: white; text-decoration: none"
                  >Selengkapnya</a
                >
              </button>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
        <div class="col">
          <div
            class="card"
            id="card-card-total"
            style="border-left: 4px solid #165baa;box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);"
          >
            <div class="card-body" id="card-total">
              <i class="uil uil-books" style="font-size: 25px"></i>
              <?php
              while($ambil_data=$resultbuku->fetch_assoc()){

              
            ?>
              <p class="card-title" id="total-title">Data Buku</p>
              <p class="card-text">Total <?php echo $ambil_data['jumlah'];?> Buku</p>
              <button
                type="submit"
                style="
                  background-color: #165baa;
                  color: white;
                  border: none;
                  border-radius: 10px;
                  font-size: 10px;
                  padding: 12px;
                "
              >
                <a
                  href="tampilbuku.php"
                  style="color: white; text-decoration: none"
                  >Selengkapnya</a
                >
              </button>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
        <div class="col">
          <div
            class="card"
            id="card-card-total"
            style="border-left: 4px solid #a155b9;box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.1);"
          >
            <div class="card-body" id="card-total" >
            <i class="uil uil-transaction"style="font-size: 25px"></i>              
            <?php
              while($ambil_data=$resulttransaksi->fetch_assoc()){

              
            ?>
              <p class="card-title" id="total-title">Transaksi</p>
              <p class="card-text">Total <?php echo $ambil_data['jumlah'];?> Transaksi</p>
              <button
                type="submit"
                style="
                  background-color: #a155b9;
                  color: white;
                  border: none;
                  border-radius: 10px;
                  padding: 12px;
                  font-size: 10px;
                "
              ><a
                  href="tampiltransaksi.php"
                  style="color: white; text-decoration: none"
                  >Selengkapnya</a
                >
              </button>
              <?php
              
              }?>
            </div>
          </div>
        </div>
    
      </div>
      <div id="title-container">
        <p id="title" style="margin-top: 30px; margin-bottom: 30px">
        <i class="uil uil-history" style="font-size: 25px;"></i>
          Riwayat Transaksi
        </p>
      </div>
      <div class="row" style="margin-top: 20px; " >
                <div class="col">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>No</th>
                            <th>Id Transaksi</th>
                            <th>Id User</th>
                            <th>Id Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                        </tr>
                        <?php
                            $no=1;
                            while($ambil_data=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $ambil_data['id_transaksi'];?></td>
                            <td><?php echo $ambil_data['id_user'];?></td>
                            <td><?php echo $ambil_data['id_buku'];?></td>
                            <td><?php echo $ambil_data['tgl_pinjam'];?></td>
                            <td><?php echo $ambil_data['tgl_kembali'];?></td>
                           
                        </tr>
                        <?php
                            }
                        ?>
                    </table> 
                </div>
            </div>
    </section>
  </body>
</html>
