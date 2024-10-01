# 中島義一　ソースコード提示

直近のLaravelを使ったWebサイトとWordpressをカスタマイズしたWebサイトをご提示します。

全て一人で実装したサイトになり、phpの他css、Javascriptも含め提示しております。

## [laravel/l01](https://github.com/nakashima0528/nakashima2024/tree/main/laravel/l01)

### 海外顧客向けコンシェルジュサービス
[https://jpconcierge.com/](https://jpconcierge.com/)

・一般ユーザサイト

・会員用マイページサイト home

・運用管理サイト admin

Laravelプロジェクトのソースコード提示に不要と思われるファイルは除外し、主な機能と画面を抜粋して提示しております

#### ピックアップ

日次で延滞金等を計算するバッチ

[BatchDaily.php](https://github.com/nakashima0528/nakashima2024/blob/main/laravel/l01/app/Console/Commands/BatchDaily.php)

請求関連のコントローラ

[InvoiceController.php](https://github.com/nakashima0528/nakashima2024/blob/main/laravel/l01/app/Http/Controllers/InvoiceController.php)

データ処理を集約したリリポジトリ―

[BaseRepository.php](https://github.com/nakashima0528/nakashima2024/blob/main/laravel/l01/app/Repositories/BaseRepository.php)

---

## [wordpress/w01](https://github.com/nakashima0528/nakashima2024/tree/main/wordpress/w01)

### 日本のムスリム商品紹介サイト
[https://jiohas.com/](https://jiohas.com/)

wordpressのカスタム投稿で商品と販売企業をさせる、商品紹介ポータルサイト

オリジナルテーマにてフルカスタマイズにて構築したテーマ一式を提示しております。

#### ピックアップ

トップページ

[front-page.php](https://github.com/nakashima0528/nakashima2024/blob/main/wordpress/w01/front-page.php)

商品詳細ページ

[single-product.php](https://github.com/nakashima0528/nakashima2024/blob/main/wordpress/w01/single-product.php)
