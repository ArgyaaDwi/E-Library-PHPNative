<?php 
    session_start();
    include "konek.php";
    if(!isset($_SESSION['login_nama'])){
        header("Location: regislogin.php");
        
        exit;
      }
    if(isset($_SESSION['pinjam'])){
    $id_buku = $_SESSION['pinjam'];
    $query="SELECT * FROM buku WHERE id_buku = $id_buku";
    $result = mysqli_query($koneksi, $query);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="pinjam.css">
</head>
<body>
    <section id="section-wrapper">
        <?php
             while($ambil_data=mysqli_fetch_array($result)){
        ?>
        <div class="box-wrapper">
            <div class="info-wrap">
                <h2 class="info-title">Informasi Buku</h2>
                <h3 class="info-sub-title">Judul : <?php echo $ambil_data['judul']?></h3>
                <h3 class="info-sub-title">Penerbit : <?php echo $ambil_data['penerbit']?></h3>
                <h3 class="info-sub-title">Penulis : <?php echo $ambil_data['penulis']?></h3>
                <br>
                <p>Sinopsis</p>
                <p style="margin-right:90px;"><?php echo $ambil_data['sinopsis']?></p>
            </div>
            <?php
             }
            ?>
            <div class="form-wrap">
                <form action="simpanpinjam.php" method="POST">
                    <h2 class="form-title">Formulir Peminjaman</h2>
                    <div class="form-fields">
                        <div class="form-group">
                            <input type="text" class="fname" name="nama" placeholder="Nama Lengkap">
                        </div>
                        
                        <div class="form-group">
                            <input type="email" class="fname" name="email" placeholder="Alamat Email">
                        </div>
                        <div class="form-group">
                            <label for="" >Tanggal Pinjam</label>
                            <input type="date" class="phone" name="tgl_pinjam"placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="" style="margin-top: 10px;">Tanggal Kembali</label>
                            <input type="date" class="phone" name="tgl_kembali"placeholder="Phone">
                        </div>
                       
                        <div class="form-group">
                            <label for="" style="margin-top: 10px;">Nomor Telepon</label>
                            <input type="text" class="phone" name="no_telp" placeholder="Phone">
                        </div>
                       
                    </div>
                    <input type="submit" value="submit" name="submit"style="margin-top:100px;margin-bottom:75px;"class="submit-button">
                    <a href="user.php" style="margin-left:313px;text-decoration:none;">Back</a>
                </form>
            </div>
        </div>
    </section>
</body>
</html>