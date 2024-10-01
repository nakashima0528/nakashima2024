<?php
get_header();
?>
	<article class="pageWrap">
		<ol class="breadcrumb">
			<li><a href="<?= home_url('/'); ?>">HOME</a></li>
			<li><?php the_title(); ?></li>
		</ol>
		<div class="contents pageWidth">
			<main>
				<h2 class="subTitle"><?php the_title(); ?></h2>
        <div class="pageBody">
<?php if (have_posts()) :  while (have_posts()) : the_post();  ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>
        </div>
      </main>
		</div><!-- pageWidth -->
	</article><!-- pageWrap -->
<?php
get_footer();