<?php
/*
Template Name: for BUYER
*/
get_header();
?>
	<article>
    <section class="secBuyerMain">
      <ol class="breadcrumb">
        <li><a href="<?= home_url('/'); ?>">HOME</a></li>
        <li><?php the_title(); ?></li>
      </ol>
      <div class="pageWidth">
        <h1 class="secBuyerMain__title">
          <img src="<?= get_template_directory_uri(); ?>/dist/img/buyer/key01.png" alt="To All BUYERS">
        </h1>
        <p class="secBuyerMain__text">Halal Products from Japan to Muslims Around the World</p>
      </div>
    </section>
    <section class="secBuyerAbout">
      <div class="pageWidth">
        <h2>Thank you for visiting the JIOHAS website.</h2>
        <p class="secBuyerAbout__text">Thank you for checking JIOHAS where we collect “Made in Japan” Halal products.<br>
We will provide an opportunity to conduct business matching<br class="pc">
between international buyers and Japanese manufactures.</p>
        <div class="secBuyerAbout__image">
          <picture>
            <source srcset="<?= get_template_directory_uri(); ?>/dist/img/buyer/image01@sp.png" media="(max-width: 767px)">
            <img src="<?= get_template_directory_uri(); ?>/dist/img/buyer/image01.png" alt="about JIOHAS">
          </picture>
        </div>
      </div>
    </section>
<?php
$posts = [];
if(have_rows('recomended_product', 'option')){
  while ( have_rows('recomended_product', 'option') ){
    the_row();
    $posts[] = get_sub_field('recomended_product_post', 'option');
  }
}
$args = array(
  'post_type' => 'product',
  'posts_per_page' => -1,
  'orderby' => 'post__in',
  'post__in' => $posts,
);
$the_query  = new WP_Query($args);
$title      = 'Recomended Items';
$showcaseID = 2; // FOOD
$term       = get_term( $showcaseID,'showcase');
$link       = get_term_link($term);
$identifier = 'recomended';
if ( $the_query->have_posts() ) : 
?>
<?php include( 'inc/section-slide.php' ); ?>
<?php endif; wp_reset_postdata(); ?>

    <section class="secBuyerYoucan">
      <div class="pageWidth">
        <h2>Things You Can Do <br class="sp">with JIOHAS</h2>
      </div>
      <div class="secBuyerYoucan__bgGray">
        <div class="pageWidth">
          <div class="secBuyerYoucan__box">
            <div class="secBuyerYoucan__boxImage">
              <img src="<?= get_template_directory_uri(); ?>/dist/img/buyer/image02.png" alt="Product Search">
            </div>
            <div class="secBuyerYoucan__boxText">
              <div class="secBuyerYoucan__index">01</div>
              <h3>Product Search</h3>
              <p>Currently, JIOHAS registers ~ Japanese Halal products from ~ companies. JIOHAS is the only and the biggest website that deals Halal certified / Muslim Friendly products from Japan. Do not hesitate to contact us if you need any further information regarding the products.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="pageWidth">
        <div class="secBuyerYoucan__box secBuyerYoucan__box--reverse">
          <div class="secBuyerYoucan__boxImage">
            <img src="<?= get_template_directory_uri(); ?>/dist/img/buyer/image03.png" alt="Product Introduction">
          </div>
          <div class="secBuyerYoucan__boxText">
            <div class="secBuyerYoucan__index">02</div>
            <h3>Product Introduction</h3>
            <p>JIOHAS also has the Japanese Halal products which are unpublished. If you are looking for any particular products, kindly let us know.</p>
          </div>
        </div>
      </div>
      <div class="secBuyerYoucan__bgGray">
        <div class="pageWidth">
          <div class="secBuyerYoucan__box">
            <div class="secBuyerYoucan__boxImage">
              <img src="<?= get_template_directory_uri(); ?>/dist/img/buyer/image04.jpg" alt="Business Negotiation Support with Companies">
            </div>
            <div class="secBuyerYoucan__boxText">
              <div class="secBuyerYoucan__index">03</div>
              <h3>Business Negotiation Support with Companies</h3>
              <p>JIOHAS supports fully from matching to transaction between buyers and manufactures. Please be assured if you do not have any experiences dealing with Japanese companies.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="pageWidth">
        <div class="secBuyerYoucan__box secBuyerYoucan__box--reverse">
          <div class="secBuyerYoucan__boxImage">
            <img src="<?= get_template_directory_uri(); ?>/dist/img/buyer/image05.jpg" alt="Export Support">
          </div>
          <div class="secBuyerYoucan__boxText">
            <div class="secBuyerYoucan__index">04</div>
            <h3>Export Support</h3>
            <p>We do full support from business negotiation to export.</p>
          </div>
        </div>
      </div>
      <div class="secBuyerYoucan__bar"></div>
    </section>
    <section class="secBuyerFlow">
      <div class="pageWidth">
        <h2>Transaction Flow</h2>
        <div class="secBuyerFlow__image">
          <picture>
            <source srcset="<?= get_template_directory_uri(); ?>/dist/img/buyer/image06@sp.png" media="(max-width: 767px)">
            <img src="<?= get_template_directory_uri(); ?>/dist/img/buyer/image06.png" alt="Transaction Flow">
          </picture>
        </div>
        <p class="secBuyerFlow__text">Overseas buyers can use JIOHAS services for free.<br>
If you are interested in any products, please feel free to contact us.</p>
      </div>
    </section>
  </article>
<?php
get_footer();
