<?php
get_header();
$term_id = get_queried_object_id();
$term = get_term($term_id, 'showcase');
$p_term  = null;
if($term->parent != 0){
  $p_term = get_term( $term->parent,'showcase');
}
?>
	<div class="pageWrap">
		<ol class="breadcrumb">
			<li><a href="<?= home_url('/'); ?>">HOME</a></li>
<?php if($p_term): ?>
      <li><a href="<?= get_category_link( $p_term ) ?>"><?= $p_term->name ?></a></li>
<?php endif ?>
			<li><?= single_cat_title('', false); ?></li>
		</ol>
		<div class="contents pageWidth">
			<?php get_sidebar('showcase'); ?>
			<main>
				<h2 class="subTitle"><?= single_cat_title('', false); ?></h2>
<?php if (have_posts()): ?>
				<ul class="productList">
	<?php while(have_posts()) : the_post(); ?>
<?php include( 'inc/list-product.php' ); ?>
	<?php endwhile; ?>
				</ul>
				<div class="pagenation">
					<?php wp_pagenavi(); ?>
				</div>
<?php else: ?>
				<p class="mtS">No product registered.</p>
<?php endif; ?>
			</main>
		</div><!-- pageWidth -->
	</div><!-- pageWrap -->
<?php
get_footer();
