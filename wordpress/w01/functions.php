<?php
/**
 * 分割functions読込
 */

// 共通関数
include_once(TEMPLATEPATH.'/functions/common.php');
// HTMLに自動挿入されるコードを無効化
include_once(TEMPLATEPATH.'/functions/unnecessary.php');


/**
 * 基本設定関連
 */

// フィード表示
add_theme_support('automatic-feed-links');

// アイキャッチの有効化
add_theme_support( 'post-thumbnails' );
// アイキャッチサイズ
//add_image_size('list-thum', 600, 400, true);

/**
 * CSS JS 読込
 */
function add_styles() {
	// reset style
	wp_register_style(
		'reset_style',
		get_template_directory_uri() . '/dist/css/reset.css',
		array(),
		'1.0' 
	);
	// main style
	wp_enqueue_style(
		'main_style',
		get_template_directory_uri() . '/dist/css/style.css',
		array('reset_style'),
		filemtime(get_theme_file_path().'/dist/css/style.css') 
	);
}
add_action('wp_enqueue_scripts', 'add_styles');  

/**
 * 投稿エディター関連
 */

// 固定ページで抜粋を使えるようにする
add_post_type_support( 'page', 'excerpt' );

// 投稿画面 画像フォルダ ショートカット
function imagepassshort($arg) {
	$content = str_replace('"dist/img/', '"' . get_bloginfo('template_directory') . '/dist/img/', $arg);
	return $content;
}
add_action('the_content', 'imagepassshort');
 
/**
* 投稿スラッグ　ポストタイプ＋投稿ID
*/
function custom_auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {

	if ($post_type == 'supplier' || $post_type == 'product') {
		$slug = $post_ID;
	}

	return $slug;
}
add_filter( 'wp_unique_post_slug', 'custom_auto_post_slug', 10, 4 );

/**
* 特定の投稿タイプだけをクラシックエディター
*/
add_filter( 'use_block_editor_for_post', function( $use_block_editor, $post ) {
	if ('product' === $post->post_type || 'supplier' === $post->post_type) {
		$use_block_editor = false;
	}
	return $use_block_editor;
}, 10, 2 );

/**
* 抜粋文字数変更
*/
function custom_excerpt_length( $length ) {
		return 256;
}
add_filter( 'excerpt_length' , 'custom_excerpt_length' , 999 );

/**
* 投稿画面カテゴリの表示順を維持
*/
function keep_category_order( $args, $post_id = null ) {
  $args['checked_ontop'] = false;
  return $args;
}
add_action( 'wp_terms_checklist_args', 'keep_category_order' );

/**
* pre_get_posts で最大表示件数を設定する
*/
function my_preget_posts($query) {
	if (is_admin() || ! $query->is_main_query()){
		return;
	}
	if ($query->is_tax('showcase') || $query->is_search()) {
		$query->set('posts_per_page', 20);
		return;
	}
}
add_action('pre_get_posts', 'my_preget_posts');

/**
* [設定]→[投稿設定]から全てのカスタム投稿のデフォルトタームを設定可能とする。
*/
add_action('load-options-writing.php', 'add_default_term_setting_item' );
function add_default_term_setting_item(){
  $post_types=get_post_types(array('public' => true, 'show_ui' => true ), false);
  if($post_types){
    foreach($post_types as $post_type_slug => $post_type){
      $post_type_taxonomies = get_object_taxonomies( $post_type_slug, false );
      if($post_type_taxonomies){
        foreach ($post_type_taxonomies as $tax_slug => $taxonomy) {
          if ( ! ( $post_type_slug == 'post' && $tax_slug == 'category' ) && $taxonomy->show_ui ) {
            add_settings_field( $post_type_slug . '_default_' . $tax_slug, $post_type->label . '用' . $taxonomy->label . 'の初期設定' , 'default_term_setting_field', 'writing', 'default', array( 'post_type' => $post_type_slug, 'taxonomy' => $taxonomy ) );
          }
        }
      }
    }
  }
}
//----------------------------------------------------------------------------
// add_settings_fieldから呼び出されるコールバック関数
//----------------------------------------------------------------------------
function default_term_setting_field( $args ) {
		$option_name = $args['post_type'] . '_default_' . $args['taxonomy']->name;
		$default_term = get_option( $option_name );
		$terms = get_terms( $args['taxonomy']->name, 'hide_empty=0' );
		if ( $terms ) :
?>
		<select name="<?php echo $option_name; ?>">
				<option value="0">設定しない</option>
				<?php foreach ( $terms as $term ) : ?>
				<option value="<?php echo esc_attr( $term->term_id ); ?>"<?php echo $term->term_id == $default_term ? ' selected="selected"' : ''; ?>><?php echo esc_html( $term->name ); ?></option>
				<?php endforeach; ?>
		</select>
<?php
		else:
?>
		<p><?php echo esc_html( $args['taxonomy']->label ); ?>が登録されていません。</p>
<?php
		endif;
}
//----------------------------------------------------------------------------
// Wordpressがオプションを更新すると呼び出され、デフォルトタームが設定される。
//----------------------------------------------------------------------------
add_filter( 'whitelist_options', 'allow_default_term_setting' );
function allow_default_term_setting( $whitelist_options ) {
		$post_types = get_post_types( array( 'public' => true, 'show_ui' => true ), false );
		if ( $post_types ) {
				foreach ( $post_types as $post_type_slug => $post_type ) {
						$post_type_taxonomies = get_object_taxonomies( $post_type_slug, false );
						if ( $post_type_taxonomies ) {
						foreach ( $post_type_taxonomies as $tax_slug => $taxonomy ) {
								if ( ! ( $post_type_slug == 'post' && $tax_slug == 'category' ) && $taxonomy->show_ui ) {
										$whitelist_options['writing'][] = $post_type_slug . '_default_' . $tax_slug;
								}
						}
				}
				}
		}
		return $whitelist_options;
}
//============================================================================
// カスタム投稿を登録した際、ターム(カテゴリ)が選択されていない場合、デフォルトタームが自動で設定される。
//============================================================================
add_action( 'wp_insert_post', 'add_post_type_default_term', 10, 2 );
function add_post_type_default_term( $post_id, $post ) {
		if((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) || $post->post_status == 'auto-draft') { return; }
 
		$taxonomies = get_object_taxonomies( $post, false );
		if ($taxonomies) {
				foreach ($taxonomies as $tax_slug => $taxonomy) {
						$default = get_option( $post->post_type . '_default_' . $tax_slug );
						if(!($post->post_type == 'post' && $tax_slug == 'category' ) && $taxonomy->show_ui && $default && ! ( $terms = get_the_terms( $post_id, $tax_slug ))) {
								if($taxonomy->hierarchical){
										$term = get_term($default, $tax_slug);
										if($term){
												wp_set_post_terms($post_id, array_filter(array($default)), $tax_slug );
										}
								} else {
										$term = get_term($default, $tax_slug);
										if($term){
												wp_set_post_terms($post_id, $term->name, $tax_slug);
										}
								}
						}
				}
		}
}

/**
 * 公開済みのカスタム投稿タイプの記事数を取得
 */
function get_count($post_type) {
  $count_custom = wp_count_posts($post_type);
  $custom_posts = $count_custom->publish;

  return $custom_posts;
}