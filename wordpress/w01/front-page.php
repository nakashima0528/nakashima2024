<?php
get_header();
?>

  <section class="secTopMain">
    <div class="secTopMain__regist">
      <dl><dt>SUPPLIERs</dt><dd><?= number_format(get_count('supplier')+(int)get_field('registered_supplier', 'option')); ?></dd></dl>
      <dl><dt>BUYERs</dt><dd><?= number_format(get_field('registered_buyers', 'option')); ?></dd></dl>
      <dl><dt>PRODUCTs</dt><dd><?= number_format(get_count('product')+(int)get_field('registered_products', 'option')); ?></dd></dl>
    </div>
    <div class="secTopMain__image"></div>
  </section>

  <section class="secTopAbout">
    <div class="pageWidth">
      <div class="secTopAbout__box">
        <div class="secTopAbout__box01">
          <img src="<?= get_template_directory_uri(); ?>/dist/img/top_image01.png" alt="image01">
        </div>
        <div class="secTopAbout__box02">
          <p>Discover Authentic Japanese Halal Products. JIOHAS is B2B E-commerce platform for global trade from Japan.</p>
        </div>  
      </div>
      <ul class="secTopAbout__link">
        <li>
          <a href="<?= home_url('buyer'); ?>">
            <div class="secTopAbout__linkImage"><img src="<?= get_template_directory_uri(); ?>/dist/img/top_image02.jpg" alt="BUYERs"></div>
            <div class="secTopAbout__linkTitle">for BUYERs</div>
          </a>
        </li>
        <li>
          <a href="<?= home_url('supplier-japan'); ?>">
            <div class="secTopAbout__linkImage"><img src="<?= get_template_directory_uri(); ?>/dist/img/top_image03.jpg" alt="SUPPLIERs"></div>
            <div class="secTopAbout__linkTitle">for JAPANESE SUPPLIERs</div>
          </a>
        </li>
      </ul>
    </div><!-- pageWidth -->
  </section>

  <section class="secTopCategory">
    <div class="pageWidth">
      <h2 class="subTitle">CATEGORY</h2>
<?php
$terms = get_terms('showcase', array('parent' => 0));
if($terms):
?>
      <ul class="termParent">
  <?php foreach ($terms as $term): ?>
        <li>
          <h3 class="termParent__title"><a href="<?= get_category_link( $term ) ?>" class="linkHover"><?= $term->name ?></a><div class="termParent__button"><span></span><span></span></div></h3>
<?php
    $c_terms = get_terms('showcase', array('parent' => $term->term_id));
    if($c_terms):
?>
          <ul class="termChild">
      <?php foreach ($c_terms as $c_term): ?>
            <li><a href="<?= get_category_link( $c_term ) ?>" class="linkHover"><?= $c_term->name ?></a></li>
      <?php endforeach; ?>
          </ul>
    <?php endif; ?>
        </li>
  <?php endforeach; ?>
      </ul>
<?php endif; ?>
    </div><!-- pageWidth -->
  </section>

<?php
$list_count = get_field('food_list_count', 'option') ? get_field('food_list_count', 'option') : 10;
$title      = 'FOOD';
$showcaseID = 2; // FOOD
$term       = get_term( $showcaseID,'showcase');
$link       = get_term_link($term);
$identifier = 'food';

$posts = [];
if(have_rows('food_product', 'option')){
  while ( have_rows('food_product', 'option') ){
    if(count($posts)>=$list_count){
      break;
    }
    the_row();
    $posts[] = get_sub_field('food_product_post', 'option');
  }
}
$args = array(
  'post_type' => 'product',
  'posts_per_page' => $list_count,
  'tax_query' => array(
    array(
      'taxonomy' => 'showcase',
      'field' => 'id',
      'terms' => $showcaseID,
    )
  ),
  'post__not_in' => $posts,
  'orderby' => 'rand',
);
$the_query  = new WP_Query($args);
if ( $the_query->have_posts() ){
  while ( $the_query->have_posts() ) {
    if(count($posts)>=$list_count){
      break;
    }
    $the_query->the_post();
    $posts[] = get_the_ID();
  }
}
wp_reset_postdata();

$args = array(
  'post_type' => 'product',
  'posts_per_page' => $list_count,
  'orderby' => 'post__in',
  'post__in' => $posts,
);
$the_query  = new WP_Query($args);
if ( $the_query->have_posts() ) : 
?>
<?php include( 'inc/section-slide.php' ); ?>
<?php endif; wp_reset_postdata(); ?>

<?php
$list_count = get_field('helth-food_list_count', 'option') ? get_field('helth-food_list_count', 'option') : 10;
$title      = 'HEALTH FOOD・<br class="sp">SUPPLEMENT';
$showcaseID = 3; // HEALTH FOOD・SUPPLEMENT
$term       = get_term( $showcaseID,'showcase');
$link       = get_term_link($term);
$identifier = 'helthfood';

$posts = [];
if(have_rows('helth-food_product', 'option')){
  while ( have_rows('helth-food_product', 'option') ){
    if(count($posts)>=$list_count){
      break;
    }
    the_row();
    $posts[] = get_sub_field('helth-food_product_post', 'option');
  }
}
$args = array(
  'post_type' => 'product',
  'posts_per_page' => $list_count,
  'tax_query' => array(
    array(
      'taxonomy' => 'showcase',
      'field' => 'id',
      'terms' => $showcaseID,
    )
  ),
  'post__not_in' => $posts,
  'orderby' => 'rand',
);
$the_query  = new WP_Query($args);
if ( $the_query->have_posts() ){
  while ( $the_query->have_posts() ) {
    if(count($posts)>=$list_count){
      break;
    }
    $the_query->the_post();
    $posts[] = get_the_ID();
  }
}
wp_reset_postdata();

$args = array(
  'post_type' => 'product',
  'posts_per_page' => $list_count,
  'orderby' => 'post__in',
  'post__in' => $posts,
);
$the_query  = new WP_Query($args);
if ( $the_query->have_posts() ) : 
?>
<?php include( 'inc/section-slide.php' ); ?>
<?php endif; wp_reset_postdata(); ?>

<?php
$list_count = get_field('cosmetics_list_count', 'option') ? get_field('cosmetics_list_count', 'option') : 10;
$title      = 'COSMETICS';
$showcaseID = 4; // COSMETICS
$term       = get_term( $showcaseID,'showcase');
$link       = get_term_link($term);
$identifier = 'cosmetics';

$posts = [];
if(have_rows('cosmetics_product', 'option')){
  while ( have_rows('cosmetics_product', 'option') ){
    if(count($posts)>=$list_count){
      break;
    }
    the_row();
    $posts[] = get_sub_field('cosmetics_product_post', 'option');
  }
}
$args = array(
  'post_type' => 'product',
  'posts_per_page' => $list_count,
  'tax_query' => array(
    array(
      'taxonomy' => 'showcase',
      'field' => 'id',
      'terms' => $showcaseID,
    )
  ),
  'post__not_in' => $posts,
  'orderby' => 'rand',
);
$the_query  = new WP_Query($args);
if ( $the_query->have_posts() ){
  while ( $the_query->have_posts() ) {
    if(count($posts)>=$list_count){
      break;
    }
    $the_query->the_post();
    $posts[] = get_the_ID();
  }
}
wp_reset_postdata();

$args = array(
  'post_type' => 'product',
  'posts_per_page' => $list_count,
  'orderby' => 'post__in',
  'post__in' => $posts,
);
$the_query  = new WP_Query($args);
if ( $the_query->have_posts() ) : 
?>
<?php include( 'inc/section-slide.php' ); ?>
<?php endif; wp_reset_postdata(); ?>

<?php
get_footer();
