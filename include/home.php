<!DOCTYPE html>
<html lang="en">

<head>
  <?php include ("includes/head_user.php") ?>
  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      color: #444444;
      overflow-y: scroll;
      /* Pastikan ada scrollbar untuk konten yang melebihi */
    }

    body::-webkit-scrollbar {
      width: 0px;
      /* Sembunyikan scrollbar */
      background: transparent;
      /* Pilihan: untuk tampilan yang lebih menarik */
    }

    body::-webkit-scrollbar-thumb {
      background: transparent;
      /* Menghindari tampilan scrollbar yang tidak diinginkan */
    }
  </style>
</head>

<body>
  <!-- ======= Header ======= -->
  <?php include ("includes/header_user.php") ?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/assets_user/img/slide/1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Iriggation Website</span></h2>
              <p class="animate__animated animate__fadeInUp">Sumber pengetahuan, solusi terbaik, dan inspirasi terkini
                untuk efisiensi air dan pertanian berkelanjutan dalam mengoptimalkan penggunaan air dalam pertanian
                modern.</p>
              <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/assets_user/img/slide/2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Meningkatkan Efesiensi Air</h2>
              <p class="animate__animated animate__fadeInUp">Efisiensi air dalam pertanian menjadi kunci dalam mencapai
                keberlanjutan dan hasil panen yang optimal. Dengan menerapkan teknik irigasi cerdas dan menggunakan
                teknologi terkini, petani dapat mengurangi pemborosan air dan mencapai efisiensi yang lebih tinggi dalam
                pertanian mereka.</p>
              <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/assets_user/img/slide/3.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Salah Satu Sumber Irigasi</h2>
              <p class="animate__animated animate__fadeInUp">Penggunaan sumur bor sebagai salah satu sumber irigasi
                sawah saat ini telah menjadi pilihan yang efektif untuk memenuhi kebutuhan air dalam pertanian. Sumur
                bor menyediakan pasokan air yang dapat diandalkan dan konsisten, memungkinkan petani untuk menjaga tanah
                tetap lembab dan memenuhi kebutuhan air tanaman dengan lebih efisien.</p>
              <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2">
            <img src="assets/assets_user/img/1.jpg" class="img-fluid" style="height: 450px" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Pentingnya Irigasi Pertanian</h3>
            <p class="fst-italic" style="text-align:justify">
              Irigasi pada pertanian merupakan salah satu hal terpenting yang dapat menunjang
              keberhasilan panen dengan kualitas yang baik. Namun, rata-rata irigasi di daerah
              pertanian masih menggunakan cara yang tradisional, yaitu dengan cara datang langsung
              ke sawah untuk mendistribusikan air atau mematikan airnya. Oleh karena itu, untuk dapat
              mempermudah pekerjaan petani diciptakan sebuah alat yang dapat mengatur irigasi secara
              otomatis. Alat irigasi otomatis tersebut didasarkan pada pengukuran ketinggian air yang
              diharapkan dapat menjadi solusi yang efektif dan efisien untuk memastikan ketersediaan
              air yang tepat pada tanaman di sawah.
            </p>
            <p style="text-align:justify"> Sistem ini didesain untuk dapat mengatur pasokan air secara otomatis sesuai
              dengan
              ketinggian air yang terukur. Dalam sistem ini, terdapat sensor ketinggian air yang
              terpasang di area lahan sawah. Sensor ini akan secara otomatis mengukur ketinggian
              air dan memberikan informasi kepada sistem kontrol irigasi. Sistem kontrol irigasi
              kemudian akan memutuskan kapan harus memasok air ke sawah berdasarkan pada ketinggian
              air yang terukur.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <h3><strong>Kelebihan Penggunaan Alat</strong></h3><br>
        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Efisiensi Penggunaan Air</h4>
              <p class="fst-italic" style="text-align:justify">
                Alat irigasi otomatis dengan deteksi ketinggian air memungkinkan penggunaan air
                yang lebih efisien. Dengan mendeteksi ketinggian air di area irigasi, alat ini
                dapat mengatur penyiraman tanaman sesuai kebutuhan tanpa adanya pemborosan air.
                Hal ini membantu mengurangi konsumsi air yang tidak perlu dan menghemat sumber
                daya air yang berharga.
              </p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Penghematan Waktu dan Tenaga</h4>
              <p class="fst-italic" style="text-align:justify">
                Dengan menggunakan alat irigasi otomatis, pengguna dapat menghemat waktu dan
                tenaga yang diperlukan dalam melakukan penyiraman manual. Alat ini bekerja secara
                otomatis, sehingga pengguna tidak perlu secara teratur memeriksa dan mengatur
                penyiraman secara langsung datang ke sawah.
              </p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4>Pengendalian Ketinggian Air</h4>
              <p class="fst-italic" style="text-align:justify">
                Mampu mengendalikan ketinggian air dengan akurat. Sensor ketinggian air yang
                terintegrasi dapat mendeteksi perubahan ketinggian air dengan cepat dan mengatur aliran
                air sesuai dengan batasan yang telah ditentukan. Hal ini membantu mencegah terjadinya
                luapan air atau kekeringan pada area irigasi.
              </p>
            </div>
          </div>

        </div><br>

      </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p>
            Jika Anda tertarik menggunakan layanan irigasi otomatis, silakan untuk mengikuti langkah-langkah berikut
            ini.<br>
            Kami juga siap menjawab pertanyaan-pertanyaan yang mungkin Anda miliki melalui kontak yang tertera pada
            website ini.
          </p>
        </div>

        <div class="col-lg-12 col-md-6 d-flex align-items-stretch">
          <div class="loading">
            <img src="assets/assets_user/img/service.gif" alt="loading-img" style="max-width: 100%; height: auto;">
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>
            Jika Anda memiliki pertanyaan, komentar, atau permintaan khusus, jangan ragu untuk menghubungi
            kami melalui informasi kontak di bawah ini.
          </p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <a href="https://goo.gl/maps/NgECowTdsVY4rMQt9?coh=178573&entry=tt">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>Bendungan, Kedawung, Sragen 57292.</p>
                </a>
              </div>

              <div class="email">
                <a href="mailto:ww.dv.1796@gmail.com">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>ww.dv.1796@gmail.com</p>
                </a>
              </div>

              <div class="phone">
                <a href="tel:+62 8122 9414 891">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+62 8122 9414 891</p>
                </a>
              </div>
            </div>
          </div>


          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.006772768792!2d111.04465237416731!3d-7.464500873578846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1de0caf7b969%3A0x84f1ab561042dd19!2sToko%20Pupuk%20Barokah!5e0!3m2!1sid!2sus!4v1685564175490!5m2!1sid!2sus"
              frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Irrigation Website</h3>
      <p>Solusi Irigasi Terpercaya untuk Kebutuhan Tanaman Anda - Temukan Kemudahan dan Efisiensi di Website Kami.</p>
      <div class="social-links">
        <a href="https://api.whatsapp.com/send?phone=6281229414891" target="_blank" class="whatsapp"><i
            class="bx bxl-whatsapp"></i></a>
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      </div>
      <div class="copyright">
        <strong><span>Irrigation Website&copy;2023</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/green-free-one-page-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/assets_user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/assets_user/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/assets_user/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/assets_user/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/assets_user/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/assets_user/js/main.js"></script>

</body>

</html>