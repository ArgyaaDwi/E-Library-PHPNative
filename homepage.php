<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="homepage.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    
  </head>
  <body>
    <!--Header Design-->
    <header class="header">
        <a href="#" class="logo">e-Library</a>
        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#card">Card</a>
            <?php if (isset($_SESSION['login_nama'])) { ?>
                <a href="logout.php">Logout</a>
            <?php } else { ?>
                <a href="regislogin.php" class="active">Sign In / Sign Up</a>
            <?php } ?>
        </nav>
    </header>

    <!--Home Design-->
    <section class="home" id="home">
      <div class="home-content">
        <h1>Welcome</h1>
        <div class="text-animate">
          <h3>to e-Library</h3>
        </div>
        <p>
            e-Library adalah pusat sumber daya digital yang kaya akan pengetahuan, menawarkan akses tak terbatas ke koleksi buku. Dengan menggunakan platform kami, Anda dapat menjelajahi ribuan judul dari berbagai bidang, mulai dari sastra klasik hingga teknologi modern, dari sejarah yang mendalam hingga sains terkini.
            Tidak lagi perlu mengantri di perpustakaan fisik atau merasa terbatas oleh batasan ruang. Dengan 
            <br>e-Library, Anda dapat dengan mudah menemukan buku yang Anda inginkan dalam hitungan detik.
        </p>
        <div class="btn-box">
          <a href="user.php" class="btn">Borrow Now</a>
        </div>
      </div>
    </section>

    <!--Card Section-->
    <section class="card" id="card">
      <h3 style="margin-bottom:50px;"class="heading">Recommended <span>Books</span></h3>
      <div class="card-row" style="margin-bottom: 50px;">
        <div class="card-column">
          <div class="card-body">
            <img style="height:333px;width:220px;box-shadow: 0 4px 6px rgba(0, 0, 0, 1.5);"src="aset/bintang.jpg" alt="" />
        </div>
        </div>
        <div class="card-column">
            <div class="card-body">
              <img style="height:333px;width:220px;box-shadow: 0 4px 6px rgba(0, 0, 0, 1.5);" src="aset/pergi.jpg" alt="" />
          </div>
          </div>
          <div class="card-column">
            <div class="card-body">
              <img style="height:333px;width:220px;box-shadow: 0 4px 6px rgba(0, 0, 0, 1.5);"src="aset/hrptr.jpg" alt="" />
          </div>
          </div>
      </div>
    </section>

    <!--Contact Section-->


    <footer>
      <h4>
        <img src="copyright.png" alt="" />2023 e-Library. All Rights Reserved
      </h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js
    "></script>
  </body>
</html>
