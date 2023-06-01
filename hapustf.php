<?php
    include "konek.php";
     if(isset($_POST['deltf'])){
     $id_transaksi = $_POST['id_transaksi'];
     $delete = "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'";
    
     if (mysqli_query($koneksi, $delete)) {
         echo '<script>
         alert("Berhasil menghapus buku!");
         window.location.href="user.php";
    </script>';
     } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
     }
    exit();
     }
?>
