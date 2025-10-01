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
    <link rel="stylesheet" href="{{ asset('css/tampilan_awal.css') }}">

    <link rel="stylesheet" href="aos/aos.css" />
    <link rel="stylesheet" href="css/login" />
  </head>
  <body>
    <!-- Navbar start -->
    <nav class="navbar" data-aos="fade-up">
      <a href="#" class="navbar-logo">Bengkel Ngawi <span>Motor</span></a>

      <div class="navbar-nav">
        <a href="#home">Home</a>
        <a href="#layanan">Layanan</a>
        <a href="#about">Tentang Kami</a>
        <a href="#contact">Alamat</a>
      </div>

     <div class="login">
      @auth
         @if(Auth::user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
         @else
            <a href="{{ route('user.dashboard') }}">Dashboard User</a>
       @endif


@else
    <a href="{{ route('login') }}">Login</a>
@endauth
</div>

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
          <img src="{{ asset('img/WhatsApp Image 2025-07-17 at 13.31.03_cbc95bf7.jpg') }}" alt="Servis Cvt" class="layanan-card-img"/>
          <h3 class="layanan-card-title">Servis Cvt</h3>
          <p class="layanan-card-price">IDR 50K</p>
        </div>
        <div class="layanan-card">
          <img src="{{ asset('img/WhatsApp Image 2025-07-17 at 14.44.22_cd48b40e.jpg') }}"alt="Penggantian Oli" class="layanan-card-img"/>
          <h3 class="layanan-card-title">Penggantian Oli</h3>
          <p class="layanan-card-price">IDR 50K</p>
        </div>
        <div class="layanan-card">
          <img src="{{ asset('img/WhatsApp Image 2025-07-17 at 13.31.02_a699e516.jpg') }}" alt="Servis Besar" class="layanan-card-img"/>
          <h3 class="layanan-card-title">Servis Besar</h3>
          <p class="layanan-card-price">IDR 50K</p>
        </div>
        <div class="layanan-card">
          <img src="{{ asset('img/WhatsApp Image 2025-08-06 at 13.34.29_6ff848e7.jpg') }}" alt="Kelistrikan" class="layanan-card-img" />
          <h3 class="layanan-card-title">Kelistrikan</h3>
          <p class="layanan-card-price">IDR 50K</p>
        </div>
        <div class="layanan-card">
          <img src="{{ asset('img/WhatsApp Image 2025-08-06 at 13.34.29_648db57d.jpg') }}" alt="Repaint" class="layanan-card-img" />
          <h3 class="layanan-card-title">Repaint</h3>
          <p class="layanan-card-price">IDR 50K</p>
        </div>
      </div>
    </section>

    <!-- tentang kami -->
    <section id="about" class="about">
      <h2 data-aos="zoom-in">Tentang Kami</h2>
      <div class="row">
        <div class="about-img">
          <img src="{{ asset('img/WhatsApp Image 2025-07-17 at 13.31.02_33093d44.jpg') }}" alt="Tentang Kami" data-aos="fade-up" />
        </div>
        <div class="content" data-aos="fade-up"
         data-aos-anchor-placement="center-bottom">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore
            nulla sunt eligendi consectetur nam minima, quibusdam harum. Magni a
            maxime voluptatem, eos sequi hic unde, nostrum animi aperiam
            molestias quo! Lorem ipsum dolor sit, amet consectetur adipisicing
            elit. Iste, dolor.
          </p>
        </div>
      </div>
    </section>


    <!-- contact -->
    <section id="contact" class="contact">
      <h2 data-aos="fade-down">Alamat</h2>
      <p data-aos="fade-up" data-aos-delay="200">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad, provident.
      </p>
      
      
     <div class="clock" data-aos="zoom-in" data-aos-delay="400">
    <h3>Jam Operasional</h3>
    <ul>
        <li><span>Senin - Jumat</span> <span>08.00 - 17.00</span></li>
        <li><span>Sabtu</span> <span>08.00 - 14.00</span></li>
        <li><span>Minggu</span> <span>Tutup</span></li>
      </ul>
    </div>


     <div class="map-container" data-aos="fade-up" data-aos-delay="600">
        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3068.250819266068!2d106.52393207498956!3d-6.12648199386027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMDcnMzUuMyJTIDEwNsKwMzEnMzUuNCJF!5e1!3m2!1sid!2sid!4v1754893705049!5m2!1sid!2sid"
         width="600" height="450" style="border:0;" 
         allowfullscreen="" loading="lazy" 
         referrerpolicy="no-referrer-when-downgrade">
        </iframe>
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
        <a href="#layanan">Layanan</a>
        <a href="#about">Tentang Kami</a>
        <a href="#contact">Alamat</a>
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
    <script src="{{ asset('js/tampilan_awal.js') }}"></script>
    <script src="aos/aos.js"></script>
     <script src="js/login"></script>
    <script>
      AOS.init ({
        once: false
      });
    </script>
  </body>
</html>
