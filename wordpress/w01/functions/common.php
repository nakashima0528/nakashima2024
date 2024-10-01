<?php
/**
 * 共通関数
 */


/**
 * debugログ出力　wp-content/debug.log
 * 使い方　_log("ここにメッセージを指定");
 * 標準出力設定
 * wp-config.php
 * define('WP_DEBUG', true);
 * define('WP_DEBUG_DISPLAY', false);
 * define('WP_DEBUG_LOG', true);
 */
if(!function_exists('_log')){
  function _log($message) {
    if (WP_DEBUG === true) {
      date_default_timezone_set('Asia/Tokyo');
      if (is_array($message) || is_object($message)) {
        $log_message = sprintf("%s:%s\n", date_i18n('Y-m-d H:i:s'), print_r($message, true));
      } else {
        $log_message = sprintf("%s:%s\n", date_i18n('Y-m-d H:i:s'), $message);
      }
      error_log($log_message, 3, WP_CONTENT_DIR . '/feat-debug.log');
    }
  }
}
