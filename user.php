<?php
    session_start();
    include "konek.php";
    if(!isset($_SESSION['login_nama'])){
        header("Location: regislogin.php");
        exit;
      }
      $id_user = $_SESSION['login_id']; 
      $nama = $_SESSION['login_nama'];
      $email = $_SESSION['login_email'];
      $username = $_SESSION['login_uname'];
      $query="SELECT * FROM buku ORDER BY judul ASC";
        if(isset($_POST['pinjam'])){
        $_SESSION['pinjam'] = $_POST['id_buku'];

        header("Location: pinjam.php");

    }
    $querytf=mysqli_query($koneksi,"SELECT *
    FROM buku
    JOIN transaksi ON buku.id_buku = transaksi.id_buku
    JOIN user ON transaksi.id_user = user.id_user
    WHERE transaksi.is_confirm = false AND user.id_user = $id_user");
    
    $queryhistory=mysqli_query($koneksi, "SELECT *
    FROM buku
    JOIN transaksi ON buku.id_buku = transaksi.id_buku JOIN user ON transaksi.id_user = user.id_user 
    WHERE user.id_user = $id_user
    ORDER BY tgl_pinjam ASC;
    ");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="user.css">
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <!--Navbar-->
    <header class="header">
        <a href="homepage.php" class="logo" s>e-Library</a>
        <nav class="navbar">
        <form class="d-flex" role="search" method="GET" style="height:30px;width:300px; ">
                   <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="keyword">
                   <input type="submit" class="btn btn-primary" type="submit" name="cari" value="Cari" style="background-color:purple;border:none;width:70px;">
        </form>
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16" id="datahstry">
            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
            <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
          </svg></a>
          <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16" id="datacart">
          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg></a>
          <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" id="dataprofile">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg></a>
          <a href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
          </svg></a>
        </nav>
    </header>
    <!--Home Design-->
    <section class="home" id="home">
        <div class="container text-center" >
            <div class="row row-cols-1 row-cols-md-5 g-5">
                <?php
                 if(isset($_GET['cari'])){
                  $keyword=$_GET['keyword'];
                  $query=mysqli_query($koneksi, "SELECT * FROM buku WHERE judul LIKE '%$keyword%'");

                }else{
                  $query=mysqli_query($koneksi, "SELECT * FROM buku ORDER BY judul ASC");
                }
                while($ambil_data=mysqli_fetch_array($query)){
                  ?>
              <div class="col" >
                <div class="card" style="width: 100%;height:420px;border-radius:15px;">
                    <img src="upload/<?php echo $ambil_data['gambar'];?>" class="card-img-top" alt="" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1.5);height: 250px;width:160px;margin-left:35px;margin-top:35px;">
                    <div class="card-body" style="margin-top: 10px;">
                      <h5 class="card-title" style="margin-bottom: 20px;"><?php echo $ambil_data['judul'];?> </h5>
                      <form action="" method="post">
                        <input type="hidden" name="id_buku" value="<?= $ambil_data['id_buku']?>">                     
                      <button class="btn btn-primary" name="pinjam"style="padding:10px;border-radius:6px;margin-bottom:10px;margin-top:10px;" type="submit">Pinjam Sekarang</button>
                      </form>
                    </div>
                  </div>
              </div>
             <?php
                }
                
             ?>
            </div>
          </div>
    </section>
    <section class="profile" id="profile">
      <div class="popup">
        <div class="close-btn">&times</div>
        <div class="form">
          <h2>Data Profile</h2>
          <div class="card" style="width: 24rem;">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Nama Lengkap :<?php echo $nama; ?></li>
              <li class="list-group-item">Alamat Email :<?php echo $email; ?></li>
              <li class="list-group-item">Username :<?php echo $username; ?></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="cart" id="cart">
      <div class="popup">
        <div class="close-btn1">&times</div>
        <div class="cart-element">
            <h2>Cart</h2>
            <div class="card-element">
            <div class="card">
                <h5 class="card-header">Konfirmasi Peminjaman</h5>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text"></p>
                </div>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                            $no=1;
                            while($ambil_data=mysqli_fetch_array($querytf)){
                        ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $ambil_data['judul'];?></td>
                        <td class="d-flex" >
                        <form action="edittf.php" method="post">
                           <input type="hidden" name="id_transaksi" value="<?= $ambil_data['id_transaksi'] ?>">
                           <button type="submit" name="edit" class="btn btn-danger"style="border-radius: 5px;">Konfirmasi</button>
                          </form>
                          <form action="hapustf.php" method="post">
                          <input type="hidden" name="id_transaksi" value="<?=$ambil_data['id_transaksi']?>">
                          <button type="submit" name="deltf"class="btn btn-danger" style="margin-left: 6px; border-radius:5px;background-color:red;" >Hapus</button></form>
                         
                      </td>
                    </tr>
                    <?php
                            }
                        ?>
                </table>
            </div>
            </div>
        </div>
      </div>
    </section>
    <section class="hstry" id="hstry">  
      <div class="popup">
        <div class="close-btn2">&times</div>
        <h2>History</h2>
        <div class="card">
          <div class="card-header">
            Quote
          </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Is Done</th>
                  </tr>
                    <?php
                        $no=1;
                        while($ambil_data=mysqli_fetch_array($queryhistory)){
                    ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $ambil_data['judul'];?></td>
                    <td><?php echo $ambil_data['tgl_pinjam'];?></td>
                    <td><?php echo $ambil_data['tgl_kembali'];?></td>
                    <td><?php echo $ambil_data['is_done'];?></td>       
                  </tr>
                    <?php
                        }
                    ?>
              </table> 
            </div>
        </div>
      </div>
    </section>
      <footer><h5>©2023 e-Library. All Rights Reserved</h5></footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="user.js"></script>
</body>
</html>