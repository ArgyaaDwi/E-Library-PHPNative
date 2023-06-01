<?php
    include "konek.php";
    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = './upload/';
    $penerbit = $_POST['penerbit'];
    $penulis = $_POST['penulis'];
    $sinopsis = $_POST['sinopsis'];
    $is_ready=TRUE;
    move_uploaded_file($source, $folder.$nama_file);
    $query = "INSERT INTO buku (id_buku, judul, gambar, penerbit, penulis, sinopsis, is_ready) VALUES ('$id_buku', '$judul', '$nama_file', '$penerbit', '$penulis', '$sinopsis', '$is_ready' )";
    if (mysqli_query($koneksi, $query)) {
        echo '<script>
        alert("Berhasil menambah buku!");
        window.location.href="tampilbuku.php";
    </script>';
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
   exit();
?>
