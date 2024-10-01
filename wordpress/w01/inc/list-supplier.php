          <li class="supplierList__item">
            <a href="<?php the_permalink(); ?>" class="supplierList__title"><h3><?php the_title(); ?></h3></a>     
<?php
  $s_terms = get_the_terms( get_the_ID(), 'industry' );
?>
<?php if($s_terms): ?>
            <div class="supplierList__industry">
  <?php foreach ($s_terms as $s_term): ?>
              <a href="<?= get_category_link( $s_term ) ?>" class="termLink"><?= $s_term->name ?></a>
  <?php endforeach; ?>              
            </div>
<?php endif ?>
            <p class="supplierList__excerpt"><?php the_excerpt(); ?></p>
            <div class="supplierList__link"><a href="<?php the_permalink(); ?>" class="linkMore">VIEW DETAILS ></a></div>
          </li>
