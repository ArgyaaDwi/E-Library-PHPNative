<?php
    include "konek.php";
    if (isset($_GET['id'])) {
        $id_user = $_GET['id'];
        $query = "DELETE FROM user WHERE id_user = '$id_user'";
        if (mysqli_query($koneksi, $query)) {
           echo '<script>
            alert("Berhasil menghapus user!");
            window.location.href="tampiluser.php";
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
