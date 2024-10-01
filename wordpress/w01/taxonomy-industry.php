<?php
get_header();
$term_id = get_queried_object_id();
$term = get_term($term_id, 'industry');
$p_term  = null;
if($term->parent != 0){
  $p_term = get_term( $term->parent,'industry');
}
?>
	<div class="pageWrap">
		<ol class="breadcrumb">
			<li><a href="<?= home_url('/'); ?>">HOME</a></li>
			<li><a href="<?= home_url('supplier'); ?>">Supplier List</a></li>
<?php if($p_term): ?>
      <li><a href="<?= get_category_link( $p_term ) ?>"><?= $p_term->name ?></a></li>
<?php endif ?>
			<li><?= single_cat_title('', false); ?></li>
		</ol>
		<div class="contents pageWidth">
			<?php get_sidebar('industry'); ?>
			<main>
				<h2 class="subTitle">Supplier List<small><span class="pc">／&nbsp;&nbsp;</span><br class="sp"><?= single_cat_title('', false); ?></small></h2>
<?php if (have_posts()): ?>
				<ul class="productList">
	<?php while(have_posts()) : the_post(); ?>
<?php include( 'inc/list-supplier.php' ); ?>
	<?php endwhile; ?>
				</ul>
				<div class="pagenation">
					<?php wp_pagenavi(); ?>
				</div>
<?php else: ?>
				<p class="mtS">No supplier registered.</p>
<?php endif; ?>
			</main>
		</div><!-- pageWidth -->
	</div><!-- pageWrap -->
<?php
get_footer();
