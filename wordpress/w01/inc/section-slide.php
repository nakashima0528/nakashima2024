  <section class="secProductSlide secProductSlide--<?= $identifier ?>">
    <div class="pageWidth">
      <div class="secProductSlide__header">
        <h2 class="subTitle"><?= $title ?></h2>
        <a href="<?= $link ?>" class="linkMore">VIEW MORE ></a>
      </div>
      <div class="secProductSlide__swiper">
        <div class="swiper">
          <ul class="productSlide swiper-wrapper">
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<?php include( 'list-product.php' ); ?>
  <?php endwhile; ?>
          </ul>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
      </div>
    </div><!-- pageWidth -->
    <script>
      const mySwiper_<?= $identifier ?> = new Swiper('.secProductSlide--<?= $identifier ?> .swiper', {
        slidesPerView: 'auto',
        spaceBetween: 16,
        grabCursor: true,
        pagination: {
          el: '.secProductSlide--<?= $identifier ?> .swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.secProductSlide--<?= $identifier ?> .swiper-button-next',
          prevEl: '.secProductSlide--<?= $identifier ?> .swiper-button-prev',
        },
        breakpoints: {
          1025: {
            spaceBetween: 25,
          }
        },
      });
    </script>
  </section>
