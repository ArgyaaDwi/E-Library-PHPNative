<?php
    session_start();
    include "konek.php";
    if(!isset($_SESSION['login_nama'])){
        header("Location: regislogin.php");
        
        exit;
      }
    if(isset($_POST['submit'])){
    $id_user=$_SESSION['login_id']; 
    $id_buku=$_SESSION['pinjam']; 
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $is_confirm = FALSE;
    
    $query = "INSERT INTO transaksi (id_user, id_buku, nama_peminjam, alamatemail, no_telp, tgl_pinjam, tgl_kembali, is_confirm) VALUES ('$id_user','$id_buku','$nama', '$email', '$no_telp','$tgl_pinjam', '$tgl_kembali', '$is_confirm' )";
    
    if (mysqli_query($koneksi, $query)) {
        echo '<script>
        alert("Berhasil meminjam buku!");
        window.location.href="user.php";
    </script>';
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
   exit();
    }
    
?>
