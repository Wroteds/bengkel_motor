<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bengkel Motor</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,700;1,400&display=swap"
      rel="stylesheet"
    />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My style -->
    <link rel="stylesheet" href="css/tampilan_awal.css" />
    <link rel="stylesheet" href="aos/aos.css" />

  </head>
  <body>
    <!-- Navbar start -->
    <nav class="navbar" data-aos="fade-up">
      <a href="#" class="navbar-logo">Bengkel Ngawi <span>Motor</span></a>

      <div class="navbar-nav">
        <a href="#home">Home</a>
        <a href="#layanan">Layanan</a>
        <a href="#about">Tentang Kami</a>
        <a href="#jam-operasional">Jam</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="login">
       @auth
        @if(Auth::user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
        @else
            <a href="{{ route('user.dashboard') }}">Dashboard User</a>
        @endif
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" style="background: none; border: none; color: white; cursor: pointer; font-size: 1rem; padding: 0;">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a>
    @endauth

      <div class="navbar-extra">
        <a href="#" id="hamburger"><i data-feather="menu"></i></a>
      </div>
    </nav>
    <!-- Navbar end -->

    <!-- Hero section start -->
      <section class="hero" id="home" data-aos="zoom-in-down">
      <main class="content">
        <h1>Selamat Datang DiBengkel Otomotif</h1>
        <h1></h1>
        <h1></h1>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae,
          non?
        </p>
      </main>
    </section>
    <!-- Hero sections and -->

    <!-- layanan -->
    <section id="layanan" class="layanan">
      <h2 data-aos="zoom-in">Layanan Servis</h2>

      <div class="row" data-aos="zoom-out-up">
        <div class="layanan-card">
          <img
            src="img/WhatsApp Image 2025-07-17 at 13.31.03_cbc95bf7.jpg"
            alt="Servis Cvt"
            class="layanan-card-img"
          />
          <h3 class="layanan-card-title">Servis Cvt</h3>
          <p class="layanan-card-price">IDR 50K</p>
        </div>
        <div class="layanan-card">
          <img
            src="img/WhatsApp Image 2025-07-17 at 14.44.22_cd48b40e.jpg"
            alt="Penggantian Oli"
            class="layanan-card-img"
          />
          <h3 class="layanan-card-title">Penggantian Oli</h3>
          <p class="layanan-card-price">IDR 50K</p>
        </div>
        <div class="layanan-card">
          <img
            src="img/WhatsApp Image 2025-07-17 at 13.31.02_a699e516.jpg"
            alt="Servis Besar"
            class="layanan-card-img"
          />
          <h3 class="layanan-card-title">Servis Besar</h3>
          <p class="layanan-card-price">IDR 50K</p>
        </div>
        <div class="layanan-card">
          <img src="img/images.jpg" alt="Servis Cvt" class="layanan-card-img" />
          <h3 class="layanan-card-title">Servis Cvt</h3>
          <p class="layanan-card-price">IDR 50K</p>
        </div>
        <div class="layanan-card">
          <img src="img/images.jpg" alt="Servis Cvt" class="layanan-card-img" />
          <h3 class="layanan-card-title">Servis Cvt</h3>
          <p class="layanan-card-price">IDR 50K</p>
        </div>
      </div>
    </section>

    <!-- tentang kami -->
    <section id="about" class="about">
      <h2 data-aos="zoom-in">Tentang Kami</h2>
      <div class="row">
        <div class="about-img">
          <img
            src="img/WhatsApp Image 2025-07-17 at 13.31.02_33093d44.jpg"
            alt="Tentang Kami"
            data-aos="fade-up-right"
          />
        </div>
        <div class="content">
          <h3 data-aos="fade-up-left">Servis Cvt</h3>
          <p data-aos="fade-up-left">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore
            nulla sunt eligendi consectetur nam minima, quibusdam harum. Magni a
            maxime voluptatem, eos sequi hic unde, nostrum animi aperiam
            molestias quo! Lorem ipsum dolor sit, amet consectetur adipisicing
            elit. Iste, dolor.
          </p>
        </div>
      </div>
    </section>

    <!-- jam operasional -->
   <section id="jam-operasional" class="jam-operasional">
      <h3>Jam Operasional Bengkel</h3>
      <hr />
      <li>Senin-munggu : 08 - 17.00</li>
      <li>Hari Raya Libur</li>
    </section>

    <!-- contact -->
    <section id="contact" class="contact">
      <h2>Kontak kami</h2>
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad, provident.
      </p>

      <div class="row">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3967.031362283402!2d106.52393207498956!3d-6.12648199386027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMDcnMzUuMyJTIDEwNsKwMzEnMzUuNCJF!5e0!3m2!1sid!2sid!4v1751946920307!5m2!1sid!2sid"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          class="map"
        ></iframe>

        <form action="">
          <div class="input-group">
            <i data-feather="user"></i>
            <input type="text" placeholder="nama" />
          </div>
          <div class="input-group">
            <i data-feather="mail"></i>
            <input type="text" placeholder="email" />
          </div>
          <div class="input-group">
            <i data-feather="phone"></i>
            <input type="text" placeholder="no hp" />
          </div>
          <button type="submit" class="btn">Kirim Pesan</button>
        </form>
      </div>
    </section>

    <!-- footer -->
     <footer>
      <div class="sosial">
        <a href="#"><i data-feather="instagram"></i></a>
         <a href="#"><i data-feather="facebook"></i></a>
      </div>
      

      <div class="link">
        <a href="#home">home</a>
        <a href="layanan">Layanan</a>
        <a href="#about">Tentang Kami</a>
        <a href="#jam-operasional">Jam</a>
        <a href="contact">Kontak</a>
      </div>

      <div class="credit">
        <p>Created by <a href="">Vandy&Daim</a>
        . | &Bengkel; 2025.</p>
      </div>
     </footer>

    <!-- feather icons -->
    <script>
      feather.replace();
    </script>

    <!-- My javascript -->
    <script src="js/tampilan_awal.js"></script>
    <script src="aos/aos.js"></script>
    <script>
      AOS.init ({
        once: false
      });
    </script>
  </body>
</html>
