<?php
    session_start();
    include "konek.php";
    if(!isset($_SESSION['login_nama'])){
    header("Location: regislogin.php");
    
    exit;

    }    
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "INSERT INTO user (id_user, nama, email, username, password) VALUES ('$id_user', '$nama', '$email', '$username', '$password' )";
    
    if (mysqli_query($koneksi, $query)) {
        echo '<script>
        alert("Berhasil menambah user!");
        window.location.href="tampiluser.php";
    </script>';
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
   exit();
?>
