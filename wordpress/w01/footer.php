<?php if(!isset($args['lang']) && !is_page('contact') && !is_page('thanks')): ?>
	<section class="secFooterContact">
    <div class="pageWidth">
      <h2 class="subTitle">CONTACT US</h2>
      <p class="secFooterContact__text">JIOHAS is an online expo site for Halal products and services in Japan, providing an online platform where Halal products and services can be negotiated anytime, from anywhere.</p>
      <div class="secFooterContact__box">
        <a href="<?= home_url('contact'); ?>" class="linkButton">CONTACT US</a>
      </div>
    </div>
  </section>
<?php endif; ?>
  <footer>
		<div class="pageWidth">
<?php
$terms = get_terms('showcase', array('parent' => 0));
if($terms):
?>
      <ul class="termParent">
  <?php foreach ($terms as $term): ?>
        <li>
          <div class="termParent__title"><a href="<?= get_category_link( $term ) ?>" class="linkHover"><?= $term->name ?></a></div>
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

			<ul class="footer__link">
        <li><a href="<?= home_url('supplier'); ?>" class="linkHover">Supplier List</a></li>
				<li><a href="<?= home_url('buyer'); ?>" class="linkHover">For BUYERs</a></li>
				<li><a href="<?= home_url('supplier-japan'); ?>" class="linkHover">For SUPPLIERs</a></li>
			</ul>
			<ul class="footer__link">
				<li><a href="<?= home_url('company'); ?>" class="linkHover">Company</a></li>
				<li><a href="<?= home_url('privacy'); ?>" class="linkHover">Privacy Policy</a></li>
			</ul>
		</div>
		<div class="footer__bottom">
			<div class="footer__copyright"><small>©️<?= date('Y'); ?> Japan Halal Business Association.</small></div>
			<a href="#TOP" class="footer__scrolltop linkHover"><img src="<?= get_template_directory_uri(); ?>/dist/img/icon_scrolltop.svg" alt="scroll top icon"></a>
		</div>
	</footer><!-- footer -->

	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/dist/js/script.js"></script>

<?php wp_footer(); ?>

</body>
</html>
