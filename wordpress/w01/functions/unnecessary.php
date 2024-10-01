<?php
/**
 * HTMLに自動挿入されるコードを無効化
 */

// 不要ヘッダーの非表示
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
// 絵文字用のコードを削除
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );    
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );    
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emojis' );

// コメントフィードURLを削除
add_filter('feed_links_show_comments_feed', '__return_false');
// 記事ごとのコメントフィードURLを削除
add_filter('post_comments_feed_link','__return_false');

// YARPPのwidget.cssを削除
function crunchify_dequeue_header_styles() {
  wp_dequeue_style('yarppWidgetCss');
}
add_action('wp_print_styles','crunchify_dequeue_header_styles');
// YARPPのrelated.cssを削除
function crunchify_dequeue_footer_styles() {
  wp_dequeue_style('yarppRelatedCss');
}
add_action('get_footer','crunchify_dequeue_footer_styles');
