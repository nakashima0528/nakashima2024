          <li class="productList__item swiper-slide">
            <a href="<?php the_permalink(); ?>" class="productList__link"></a>
            <div class="productList__iamge">
<?php if(has_post_thumbnail()): ?>
              <img loading="lazy" src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>">
<?php else: ?>
              <img src="<?= get_template_directory_uri(); ?>/dist/img/noimg.png" alt="no image">
<?php endif ?>
            </div>
            <div class="productList__text">
              <h3><?php the_title(); ?></h3>        
<?php
  $s_terms = get_the_terms( get_the_ID(), 'showcase' );
?>
<?php if($s_terms): ?>
              <div class="productList__showcase">
  <?php foreach ($s_terms as $s_term): ?>
                <a href="<?= get_category_link( $s_term ) ?>" class="termLink"><?= $s_term->name ?></a>
  <?php endforeach; ?>              
              </div>
<?php endif ?>
<?php if(get_field('product-certification') == '1'): ?>
              <div class="productCertification"><img src="<?= get_template_directory_uri(); ?>/dist/img/certification.png" alt="Halal Certified"></div>
<?php endif ?>
            </div>
          </li>
