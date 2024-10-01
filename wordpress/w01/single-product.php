<?php
get_header();

$s_terms = get_the_terms( get_the_ID(), 'showcase' );
$p_term  = null;
if($s_terms[0]->parent != 0){
  $p_term = get_term( $s_terms[0]->parent,'showcase');
}
?>
	<article class="pageWrap">
		<ol class="breadcrumb">
			<li><a href="<?= home_url('/'); ?>">HOME</a></li>
<?php if($p_term): ?>
      <li><a href="<?= get_category_link( $p_term ) ?>"><?= $p_term->name ?></a></li>
<?php endif ?>
			<li><a href="<?= get_category_link( $s_terms[0] ) ?>"><?= $s_terms[0]->name ?></a></li>
			<li><?php the_title(); ?></li>
		</ol>
		<div class="contents pageWidth">
			<?php get_sidebar('showcase'); ?>
			<main>
				<h1 class="productTitle"><?php the_title(); ?></h1>
<?php if($s_terms): ?>
        <div class="productShowcase">
  <?php foreach ($s_terms as $s_term): ?>
          <a href="<?= get_category_link( $s_term ) ?>" class="termLink"><?= $s_term->name ?></a>
  <?php endforeach; ?>              
        </div>
<?php endif ?>
<?php if(get_field('product-certification') == '1'): ?>
        <div class="productCertification"><img src="<?= get_template_directory_uri(); ?>/dist/img/certification.png" alt="Halal Certified"></div>
<?php endif ?>
<?php if(have_rows('product-slide')): ?>
        <div class="productPicterSlide">
          <div class="swiper">
            <ul class="swiper-wrapper">
	<?php while ( have_rows('product-slide') ) : the_row(); ?>
              <li class="swiper-slide"><img src="<?= get_sub_field('product-slide-image'); ?>" alt="<?= get_sub_field('product-slide-title'); ?>"></li>
  <?php endwhile; ?>
            </ul>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-pagination"></div>
        </div>
<?php endif; ?>
        <div class="productIntroduction">
<?php if (have_posts()) :  while (have_posts()) : the_post();  ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>
        </div>
<?php if(have_rows('product-detail')): ?>
        <div class="productDetail">
	<?php while ( have_rows('product-detail') ) : the_row(); ?>
          <dl>
            <dt><?= get_sub_field('product-detail-item'); ?></dt>
    <?php if(get_sub_field('product-detail-type') == '2'): ?>
            <dd><a href="<?= get_sub_field('product-detail-link')['url']; ?>" target="<?= get_sub_field('product-detail-link')['target']; ?>"><?= empty(get_sub_field('product-detail-link')['title']) ? get_sub_field('product-detail-link')['url'] : get_sub_field('product-detail-link')['title']; ?></a></dd>
    <?php else: ?>
            <dd><?= get_sub_field('product-detail-contents'); ?></dd>
    <?php endif; ?>
          </dl>
  <?php endwhile; ?>
        </div>
<?php endif; ?>
<?php
$company_id = get_field('product-company');
if($company_id): ?>
        <h2 class="productCompanyTitle">COMPANY</h2>
        <div class="productCompanyBox">
  <?php if(get_field('supplier-logo',$company_id)): ?>
          <div class="productCompanyBox__logo"><img src="<?= wp_get_attachment_image_url(get_field('supplier-logo',$company_id), 'full'); ?>" alt="<?= get_the_title($company_id) ?>"></div>
  <?php endif; ?>
          <dl class="productCompanyBox__first">
            <dt>Company</dt>
            <dd><?= get_the_title($company_id) ?></dd>
          </dl>
  <?php if(get_field('supplier-address',$company_id)): ?>
          <dl>
            <dt>Address</dt>
            <dd><?php the_field('supplier-address',$company_id) ?></dd>
          </dl>
  <?php endif; ?>
  <?php if(get_field('supplier-tel',$company_id)): ?>
          <dl>
            <dt>TEL</dt>
            <dd><?php the_field('supplier-tel',$company_id) ?></dd>
          </dl>
  <?php endif; ?>
  <?php if(get_field('supplier-url',$company_id)): ?>
          <dl>
            <dt>Web site</dt>
            <dd><a href="<?php the_field('supplier-url',$company_id) ?>"><?php the_field('supplier-url',$company_id) ?></a></dd>
          </dl>
  <?php endif; ?>
  <?php if(have_rows('supplier-detail',$company_id)): ?>
	  <?php while ( have_rows('supplier-detail',$company_id) ) : the_row(); ?>
          <dl>
            <dt><?= get_sub_field('supplier-detail-item',$company_id); ?></dt>
      <?php if(get_sub_field('supplier-detail-type',$company_id) == '2'): ?>
            <dd><a href="<?= get_sub_field('supplier-detail-link',$company_id)['url']; ?>" target="<?= get_sub_field('supplier-detail-link',$company_id)['target']; ?>"><?= empty(get_sub_field('supplier-detail-link',$company_id)['title']) ? get_sub_field('supplier-detail-link',$company_id)['url'] : get_sub_field('supplier-detail-link',$company_id)['title']; ?></a></dd>
      <?php else: ?>
            <dd><?= get_sub_field('supplier-detail-contents',$company_id); ?></dd>
      <?php endif; ?>
          </dl>
    <?php endwhile; ?>
  <?php endif; ?>
          <div class="productCompanyBox__more"><a href="<?= get_permalink($company_id); ?>" class="linkMore">VIEW DETAILS ></a></div>
        </div>
<?php endif; ?>
<?php
$args = array(
	'limit' => 8,
	'order' => 'score DESC',
	'template' => 'yarpp-template-list.php',
);
yarpp_related($args);
?>
      </main>
		</div><!-- pageWidth -->
	</article><!-- pageWrap -->
  <script>
    const is_roop = document.querySelectorAll('.swiper .swiper-slide').length > 1 ? true : false;
    const mySwiper = new Swiper('.swiper', {
      loop: is_roop,
      autoHeight: true,
      speed: 1500,
      slidesPerView: 'auto',
      spaceBetween: 5,
      centeredSlides: true, 
      watchOverflow: true,
      autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        1025: {
          spaceBetween: 15,
        }
      },
    });
  </script>
<?php
get_footer();