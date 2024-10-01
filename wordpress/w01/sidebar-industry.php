    <aside>
<?php
$terms = get_terms('industry', array('parent' => 0));
if($terms):
?>
	  	<ul class="termParent">
  <?php foreach ($terms as $term): ?>
			<li>
		  	<h2 class="termParent__title"><a href="<?= get_category_link( $term ) ?>" class="linkHover"><?= $term->name ?></a></h2>
<?php
	$c_terms = get_terms('industry', array('parent' => $term->term_id));
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
	  </aside>