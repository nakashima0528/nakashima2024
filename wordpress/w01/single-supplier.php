<?php
get_header();

$s_terms = get_the_terms( get_the_ID(), 'industry' );
?>
	<article class="pageWrap">
		<ol class="breadcrumb">
			<li><a href="<?= home_url('/'); ?>">HOME</a></li>
			<li><a href="<?= home_url('supplier'); ?>">Supplier List</a></li>
			<li><?php the_title(); ?></li>
		</ol>
		<div class="contents pageWidth">
<?php get_sidebar('industry'); ?>
			<main>
<?php if(get_field('supplier-logo')): ?>
        <div class="supplierLogo"><img src="<?= wp_get_attachment_image_url(get_field('supplier-logo'), 'full'); ?>" alt="<?php the_title(); ?>"></div>
<?php endif; ?>
				<h1 class="supplierTitle"><?php the_title(); ?></h1>
<?php if($s_terms): ?>
        <div class="supplierIndustry">
  <?php foreach ($s_terms as $s_term): ?>
          <a href="<?= get_category_link( $s_term ) ?>" class="termLink"><?= $s_term->name ?></a>
  <?php endforeach; ?>              
        </div>
<?php endif ?>
        <div class="supplierIntroduction"><?php the_content(); ?></div>
        <div class="supplierDetail">
          <dl>
            <dt>Company</dt>
            <dd><?php the_title(); ?></dd>
          </dl>
<?php if(get_field('supplier-address')): ?>
          <dl>
            <dt>Address</dt>
            <dd><?php the_field('supplier-address') ?></dd>
          </dl>
<?php endif; ?>
<?php if(get_field('supplier-tel')): ?>
          <dl>
            <dt>TEL</dt>
            <dd><?php the_field('supplier-tel') ?></dd>
          </dl>
<?php endif; ?>
<?php if(get_field('supplier-url')): ?>
          <dl>
            <dt>Web site</dt>
            <dd><a href="<?php the_field('supplier-url') ?>"><?php the_field('supplier-url') ?></a></dd>
          </dl>
<?php endif; ?>
<?php if(have_rows('supplier-detail')): ?>
  <?php while ( have_rows('supplier-detail') ) : the_row(); ?>
          <dl>
            <dt><?= get_sub_field('supplier-detail-item'); ?></dt>
    <?php if(get_sub_field('supplier-detail-type') == '2'): ?>
            <dd><a href="<?= get_sub_field('supplier-detail-link')['url']; ?>" target="<?= get_sub_field('supplier-detail-link')['target']; ?>"><?= empty(get_sub_field('supplier-detail-link')['title']) ? get_sub_field('supplier-detail-link')['url'] : get_sub_field('supplier-detail-link')['title']; ?></a></dd>
    <?php else: ?>
            <dd><?= get_sub_field('supplier-detail-contents'); ?></dd>
    <?php endif; ?>
          </dl>
  <?php endwhile; ?>
<?php endif; ?>
        </div>
<?php
$args = array(
  'post_type' => 'product',
  'posts_per_page' => -1,
	'meta_key' => 'product-company',
	'meta_value' => get_the_ID(), 
);
$the_query = new WP_Query($args);
?>
<?php if ( $the_query->have_posts() ):  ?>
        <section class="secSupplierProducts">
          <h2 class="subTitle">Products Handled</h2>
          <ul class="productList">
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<?php include( 'inc/list-product.php' ); ?>
	<?php endwhile; ?>
          </ul>
        </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

      </main>
		</div><!-- pageWidth -->
	</article><!-- pageWrap -->
<?php
get_footer();