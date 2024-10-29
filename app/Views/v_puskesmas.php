<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column align-items-center">
  <div class="container text-center text-md-left animate__animated animate__zoomIn" data-aos="fade-up">
    <h1 style="text-align: center;">SELAMAT DATANG DI WEBSITE RESMI</h1>
    <h1 style="text-align: center;">PUSKESMAS PANGGUNG</h1>
    <h2>Kami dengan bangga mempersembahkan situs resmi Puskesmas Panggung, tempat yang dirancang khusus untuk memperkenalkan fasilitas kesehatan kami kepada Anda.
      Pengunjung website akan menemukan beragam informasi terkait layanan yang kami tawarkan serta berbagai kegiatan yang sedang berlangsung di Puskesmas Panggung.</h2>
    <h2>Kami sangat menghargai kontribusi dan saran dari Anda untuk membantu kami terus meningkatkan kualitas pelayanan.
      Kami selalu siap menerima pertanyaan, masukan, dan tanggapan Anda melalui Halaman Pengaduan dan untuk menghubungi kami melalui telepon, email, atau melalui formulir kontak yang dapat ditemukan di halaman Hubungi Kami.
      Terima kasih atas kunjungan Anda. KESEHATAN ANDA ADALAH PRIORITAS KAMI!</h2>
    <!-- <a href="#about" class="btn-get-started scrollto">Get Started</a> -->
  </div>
</section><!-- End Hero -->

<main id="main">
  <!-- ======= Portfolio Section ======= -->
  <section id="profil" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Profil Puskesmas</h2>
      </div>

      <div class="row portfolio-container">

        <?php foreach ($profilweb as $pw) { ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow animate__animated animate__fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?= base_url('fotoprofilweb/' . $pw['fotoprofilweb']) ?>" class="img-fluid" alt="">
                <a href="<?= base_url('fotoprofilweb/' . $pw['fotoprofilweb']) ?>" data-gallery="portfolioGallery" class="link-preview-tambahan portfolio-lightbox justify-content-center" title="Preview"><i class="bx bx-show"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="<?= base_url($pw['slug']) ?>"><?= esc($pw['judulprofilweb']) ?></a></h4>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </section><!-- End Portfolio Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="pelayanan" class="portfolio">
    <div class="container">
      <div class="section-title">
        <h2>Pelayanan</h2>
      </div>

      <div class="row portfolio-container">
        <?php foreach ($pelayanan as $p) { ?>
          <div class="col-lg-4 col-md-6 portfolio-item wow animate__animated animate__fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?= base_url('fotopelayanan/' . $p['fotopelayanan']) ?>" class="img-fluid" alt="">
                <a href="<?= base_url('fotopelayanan/' . $p['fotopelayanan']) ?>" data-gallery="portfolioGallery" class="link-preview-tambahan portfolio-lightbox" title="Preview"><i class="bx bx-show"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="<?= base_url($p['slug']) ?>"><?= esc($p['namapelayanan']) ?></a></h4>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section><!-- End Portfolio Section -->


  <!-- ======= Portfolio Section ======= -->
  <section id="informasi" class="portfolio">
    <div class="container">
      <div class="section-title">
        <h2>Informasi</h2>
      </div>
      <div class="row portfolio-container">
        <?php foreach ($informasi as $i) { ?>
          <div class="col-lg-3 col-md-6 portfolio-item filter-app wow animate__animated animate__fadeInUp">
            <div class="portfolio-wrap" href="informasipuskesmas/<?= esc($i['slug']) ?>">
              <figure>
                <a href="informasipuskesmas/<?= esc($i['slug']) ?>">
                  <img src="<?= base_url('fotoinformasi/' . $i['fotoinformasi']) ?>" class="img-fluid" alt="">
                </a>
              </figure>
              <div class="portfolio-info">
                <h4><a href="informasipuskesmas/<?= $i['slug'] ?>"><?= esc($i['namainformasi']) ?></a></h4>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="text-center mt-4">
        <button id="loadMoreBtn" class="btn btn-primary button-navbar wow animate__animated animate__fadeIn">Lihat Informasi Lainnya <i class="bx bx-down-arrow-alt"></i></button>
      </div>
    </div>
  </section>
  <!-- End Portfolio Section -->
  <iframe class="wow animate__animated animate__fadeIn" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.2748798550806!2d114.76283927502143!3d-3.75020489622369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de6f3522429f66b%3A0x3a6dd98aaed0ce1!2sPuskesmas%20Panggung!5e0!3m2!1sid!2sid!4v1700636216005!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</main><!-- End #main -->


<script>
  $(document).ready(function() {
    let visibleCount = 8;
    let originalData;

    $('#loadMoreBtn').on('click', function() {
      $.ajax({
        url: '<?= base_url('home/loadMoreInformasi') ?>',
        type: 'GET',
        data: {
          lastLoadedId: visibleCount
        },
        dataType: 'json',
        success: function(data) {
          if (data.length > 0) {
            data.forEach(function(info) {
              const newElement = `
                <div class="col-lg-3 col-md-6 portfolio-item filter-app animate__animated animate__zoomIn">
                  <div class="portfolio-wrap">
                    <figure>
                    <a href="informasipuskesmas/${info.slug}">
                      <img src="<?= base_url('fotoinformasi/') ?>${info.fotoinformasi}" class="img-fluid" alt="">
                      </a>
                    </figure>
                    <div class="portfolio-info">
                      <h4><a href="informasipuskesmas/${info.slug}">${info.namainformasi}</a></h4>
                    </div>
                  </div>
                </div>`;

              $('#informasi .portfolio-container').append(newElement);
            });

            visibleCount += 4;
          } else {
            $('#loadMoreBtn').hide();

            const closingMessage = '<p class="animate__animated animate__fadeIn">Semua Informasi telah ditampilkan.</p>';
            originalData = $('#informasi .portfolio-container').html();
            $('.text-center').append(closingMessage);
          }
        },
        error: function(xhr, status, error) {
          console.error('AJAX Error:', status, error);
        }
      });
    });
  });
</script>


<?= $this->endSection(); ?>