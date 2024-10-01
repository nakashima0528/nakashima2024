<?php
get_header();
?>
	<div class="pageWrap">
		<ol class="breadcrumb">
			<li><a href="<?= home_url('/'); ?>">HOME</a></li>
			<li>Products Search</li>
		</ol>
		<div class="contents pageWidth">
			<?php get_sidebar('showcase'); ?>
			<main>
				<h2 class="subTitle">Search keyword "<?php the_search_query(); ?>"</h2>
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
				<p class="mtS">No products were found that match your search keywords.</p>
<?php endif; ?>
			</main>
		</div><!-- pageWidth -->
	</div><!-- pageWrap -->
<?php
get_footer();
