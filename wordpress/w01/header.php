<!DOCTYPE html>
<?php if(isset($args['lang']) && $args['lang']): ?>
<html lang="<?= $args['lang'] ?>">
<?php else: ?>
<html lang="en">
<?php endif; ?>
<head prefix="og: http://ogp.me/ns#">

  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">

  <link rel="icon" type="image/x-icon" href="<?= get_template_directory_uri(); ?>/dist/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?= get_template_directory_uri(); ?>/img/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" type="image/png" href="<?= get_template_directory_uri(); ?>/img/android-touch-icon.png" sizes="192x192">

<?php
  $metaTitle       = get_bloginfo('name').'｜'.get_bloginfo( 'description' );
  $metaDescription = get_bloginfo( 'description' );
  $ogpImage        = get_template_directory_uri().'/dist/img/ogp.png';
  // アイキャッチあり
  if(is_single() && has_post_thumbnail()){
    $ogpImage      = get_the_post_thumbnail_url('large');
  }
  $bodyClass       = '';

  // ホーム
  if(is_front_page()){
    $bodyClass = 'home';
  }
  // カスタム投稿 product
  elseif(is_single() && get_post_type() === 'product'){
    $metaTitle       = get_the_title().'｜'.get_bloginfo( 'name' );
    $metaDescription = get_the_excerpt();
    $bodyClass = 'single ' . get_post_type();
  }
  // カスタム投稿 supplier
  elseif(is_single() && get_post_type() === 'supplier'){
    $metaTitle       = get_the_title().'｜'.get_bloginfo( 'name' );
    $metaDescription = get_the_excerpt();
    $bodyClass = 'single ' . get_post_type();
  }
  // タクソノミー showcase
  elseif(is_tax('showcase')){
    $metaTitle       = 'Product List ／ '.single_cat_title('', false).'｜'.get_bloginfo('name');
    $metaDescription = 'list of products for the job category「'.single_cat_title('', false).'」'.get_bloginfo('name').'｜'.get_bloginfo('description');
    $bodyClass = 'showcase';
  }
  // タクソノミー industry
  elseif(is_tax('industry')){
    $metaTitle       = 'Supplier List ／ '.single_cat_title('', false).'｜'.get_bloginfo('name');
    $metaDescription = 'list of suppliers for the job category「'.single_cat_title('', false).'」'.get_bloginfo('name').'｜'.get_bloginfo('description');
    $bodyClass = 'industry';
  }
  // アーカイブ　
  elseif(is_post_type_archive('supplier')){
    $metaTitle       = 'Supplier List｜'.get_bloginfo('name');
    $metaDescription = 'List of suppliers. '.get_bloginfo('name').'｜'.get_bloginfo('description');
    $bodyClass = 'supplier';
  }
  // 検索ページ
  elseif(is_search()){
    $metaTitle       = 'Products Search｜'.get_bloginfo('name');
    $metaDescription = 'Search results for '.get_search_query().get_bloginfo('name').'｜'.get_bloginfo('description');
    $bodyClass = 'search';
  }
  // 404
  elseif(is_404()){
    $metaTitle       = '404-Page not found｜'.get_bloginfo('name');
    $metaDescription = 'The page you are looking for might have been removed had its name changed or is temporarily unavailable. '.get_bloginfo('name').'｜'.get_bloginfo('description');
    $bodyClass = 'page';
  }
  // 固定ページ
  elseif(is_page()){
    $metaTitle       = get_the_title().'｜'.get_bloginfo( 'name' );
    $metaDescription = 'Information about '.get_the_title().'. '.get_bloginfo('name').'｜'.get_bloginfo('description');
    if(get_the_excerpt()){
      $metaDescription = get_the_excerpt();
    }
    $bodyClass = 'page';
    global $post;
    $parent_id = $post->post_parent; // 親ページのIDを取得
    if($parent_id){ 								 // 親があれば親のスラッグを設定
      $bodyClass = $bodyClass.' '.get_post($parent_id)->post_name;
    }else{
      $bodyClass = $bodyClass.' '.$post->post_name;
    }	
  }
  // その他
  else{
    $metaTitle       = get_the_title().'｜'.get_bloginfo( 'name' );
    $metaDescription = 'Information about '.get_the_title().'. '.get_bloginfo('name').'｜'.get_bloginfo('description');
    $bodyClass = 'page';
  }

?>

  <title><?= $metaTitle ?></title>
  <meta name="description" content="<?= $metaDescription ?>">
  <!-- OGP -->
  <meta property="og:title" content="<?= $metaTitle ?>">
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <meta property="og:description" content="<?= $metaDescription ?>">
  <meta property="og:type" content="<?= is_front_page() ? 'website' : 'article' ?>">
  <meta property="og:url" content="https://<?= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>">
  <meta property="og:image" content="<?= $ogpImage ?>">
  <meta property="og:locale" content="<?= isset($args['lang']) && $args['lang'] == 'ja' ? 'ja_JP' : 'en_US'?>">
  <meta name="twitter:card" content="summary_large_image">

<?php if( is_front_page() || (is_single() && get_post_type() === 'product')|| is_page('buyer')): ?>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
  <script src="//cdn.jsdelivr.net/npm/swiper@8.3.1/swiper-bundle.min.js"></script>
<?php endif; ?>

<?php
  wp_deregister_script('jquery');
  wp_head();
?>

</head>
<body class="<?= $bodyClass; ?>" ontouchstart="">

  <header id="TOP">
    <div class="header__left">
      <div class="header__title">
        <a href="<?= home_url('/'); ?>"><img src="<?= get_template_directory_uri(); ?>/dist/img/logo.png" alt="<?= get_bloginfo('name') ?> logo"></a>
        <h1><?= get_bloginfo( 'description' ) ?></h1>
      </div>
    </div>
    <div class="header__right">
      <form action="<?= home_url('/'); ?>" method="get" class="header__form">
        <input type="hidden" name="post_type" value="product">
        <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="SEARCH"><button type="submit" class="linkHover"><img src="<?= get_template_directory_uri(); ?>/dist/img/icon_search.svg" alt="search icon"></button>
      </form>
      <a href="<?= home_url('contact'); ?>" class="header__contact linkHover">CONTACT US</a>
    </div>
    <div class="header__menubtn menuButton"><div><span></span><span></span></div></div>
    <aside class="haside">
      <div class="haside__icon">
        <a href="<?= home_url('/'); ?>"><img src="<?= get_template_directory_uri(); ?>/dist/img/icon.svg" alt="<?= get_bloginfo('name') ?> icon"></a>
      </div>
      <div class="haside__menubtn menuButton"><div><span></span><span></span></div></div>
      <div class="haside__copyright">© <?= date('Y'); ?> Japan halal business asociation.</div>
    </aside>
    <div class="menuBox">
      <div class="menuBox__title">
        <a href="<?= home_url('/'); ?>"><img src="<?= get_template_directory_uri(); ?>/dist/img/logo@w.png" alt="<?= get_bloginfo('name') ?> logo"></a>
        <div><?= get_bloginfo( 'description' ) ?></div>
      </div>
      <div class="menuBox__body">
        <div class="menuBox__wrap">
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

          <hr class="menuBox__hr">

          <ul class="menuBox__link">
            <li><a href="<?= home_url('supplier'); ?>" class="linkHover">Supplier List</a></li>
            <li><a href="<?= home_url('buyer'); ?>" class="linkHover">For BUYERs</a></li>
            <li><a href="<?= home_url('supplier-japan'); ?>" class="linkHover">For SUPPLIERs</a></li>
          </ul>
          <ul class="menuBox__link">
            <li><a href="<?= home_url('company'); ?>" class="linkHover">Company</a></li>
            <li><a href="<?= home_url('privacy'); ?>" class="linkHover">Privacy Policy</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
