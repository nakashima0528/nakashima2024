<?php
get_header();
?>
	<div class="pageWrap">
		<ol class="breadcrumb">
			<li><a href="<?= home_url('/'); ?>">HOME</a></li>
			<li>Supplier List</li>
		</ol>
		<div class="contents pageWidth">
			<?php get_sidebar('industry'); ?>
			<main>
				<h2 class="subTitle">Supplier List</h2>
<?php if (have_posts()): ?>
				<ul class="supplierList">
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
