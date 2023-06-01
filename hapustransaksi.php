<?php
    include "konek.php";
    if (isset($_GET['id'])) {
        $id_transaksi = $_GET['id'];
        $query = "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'";
        if (mysqli_query($koneksi, $query)) {
           echo '<script>
            alert("Berhasil menghapus transaksi!");
            window.location.href="tampiltransaksi.php";
        </script>';
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($koneksi);
        }
    } else {
        echo "ID user tidak ditemukan.";
    }
    mysqli_close($koneksi);
exit();
?>
