<?php
    $koneksi=mysqli_connect("localhost", "root", "", "perpus");
    if(!$koneksi){
        echo "Koneksi gagal";
    }  
?>