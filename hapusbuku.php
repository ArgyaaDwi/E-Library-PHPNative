<?php
    include "konek.php";
    if (isset($_GET['id'])) {
        $id_buku = $_GET['id'];
        $query = "DELETE FROM buku WHERE id_buku = '$id_buku'";
        
        if (mysqli_query($koneksi, $query)) {
            echo '<script>
            alert("Berhasil menghapus buku!");
            window.location.href="tampilbuku.php";
        </script>';
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($koneksi);
        }
    } else {
        echo "ID Buku tidak ditemukan.";
    }
    
    mysqli_close($koneksi);
exit();

?>
