<?php
    session_start();
    include "konek.php";
    if(!isset($_SESSION['login_nama'])){
    header("Location: regislogin.php");
    exit;
    }
    if (isset($_POST['edit'])) {
        $id_transaksi = $_POST['id_transaksi'];
        $query = "UPDATE transaksi SET is_confirm = TRUE WHERE id_transaksi = '$id_transaksi'";

        if (mysqli_query($koneksi, $query)) {
            echo '<script>
            alert("Berhasil mengubah status transaksi!");
            window.location.href = "user.php";
            </script>';
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($koneksi);
            }
    } else {
        echo "ID Transaksi tidak ditemukan.";
    }
    mysqli_close($koneksi);
    exit();
?>
