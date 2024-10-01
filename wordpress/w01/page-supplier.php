<?php
/*
Template Name: 日本のサプライヤーへ
*/
get_header('',['lang'=>'ja']);
?>
	<article>
    <section class="secSupplierMain">
      <ol class="breadcrumb">
        <li><a href="<?= home_url('/'); ?>">HOME</a></li>
        <li><?php the_title(); ?></li>
      </ol>
      <div class="pageWidth">
        <div class="secSupplierMain__key01">
          <img src="<?= get_template_directory_uri(); ?>/dist/img/supplier/key01.png" alt="Made in Japan">
        </div>
        <h1>国産ハラル商品を<br class="sp">世界のムスリムへ。</h1>
        <p class="secSupplierMain__text">JIOHASは、日本製ハラル商品を海外バイヤー向けに情報配信する、<br class="pc">
日本最大級のオンライン・ショーケースです。</p>
      </div>
    </section>
    <div class="secSupplierMain__box"></div>
    <section class="secSupplierSlide">
      <h2>多くの企業様にご利用頂いています</h2>
<div class="secSupplierSlide__image">
<img src="<?= get_template_directory_uri(); ?>/dist/img/supplier/slide.png" alt="slide1"><img src="<?= get_template_directory_uri(); ?>/dist/img/supplier/slide.png" alt="slide2">
</div>      
      <div class="pageWidth">
        <div class="secSupplierSlide__regist">
          <dl><dt>掲載企業数</dt><dd><?= number_format(get_count('supplier')); ?><span>社</span></dd></dl>
          <dl><dt>掲載商品数</dt><dd><?= number_format(get_count('product')); ?><span>商品</span></dd></dl>
          <dl><dt>登録海外バイヤー</dt><dd><?= number_format(get_field('registered_buyers', 'option')); ?><span>社以上</span></dd></dl>
        </div>
      </div>
    </section>
    <section class="secSupplierAbout">
      <div class="pageWidth">
        <h2><span>ABOUT JIOHAS</span>JIOHASとは？</h2>
        <div class="secSupplierAbout__image01">
          <picture>
            <source srcset="<?= get_template_directory_uri(); ?>/dist/img/supplier/image01@sp.png" media="(max-width: 767px)">
            <img src="<?= get_template_directory_uri(); ?>/dist/img/supplier/image01.png" alt="ABOUT JIOHAS">
          </picture>
        </div>
        <p class="secSupplierAbout__text">JIOHASは、一般社団法人ハラル・ジャパン協会が運営する、<br class="pc">
日本製ハラル商品を海外バイヤー向けに情報発信するオンライン・ショーケースです。<br>
ハラル商品を扱う日本企業と海外バイヤーのマッチングを手伝うオンライン・プラットフォームです。<br>
商品掲載〜商談成立・輸出サポートまでフルでお手伝いいたします。</p>
      </div>
      <div class="secSupplierAbout__gray">
        <div class="pageWidth">
          <h3>ハラル認証取得後に、<br class="sp">こんな悩みありませんか？</h3>
          <div class="secSupplierAbout__image02">
            <picture>
              <source srcset="<?= get_template_directory_uri(); ?>/dist/img/supplier/image02@sp.png" media="(max-width: 767px)">
              <img src="<?= get_template_directory_uri(); ?>/dist/img/supplier/image02.png" alt="ハラル認証取得後に、こんな悩みありませんか？">
            </picture>
          </div>
        </div>
      </div>
      <div class="pageWidth">
        <div class="secSupplierAbout__box"><p>JIOHASならPRからご契約、<br class="sp">輸出まで1ストップで解決します。</p></div>
        <ul class="secSupplierAbout__list">
          <li>
            <img src="<?= get_template_directory_uri(); ?>/dist/img/supplier/image03.jpg" alt="輸出方法">
            <div class="secSupplierAbout__listText">
              <h4><span>＼ 商品が欲しいと言われたけど ／</span>輸出方法が分からない</h4>
              <p>ハラル商品を作ったはいいものの、輸出にどう活かしていいか分からない企業様を数々サポートしてきました。世界の４人に１人がムスリムの世の中、ハラル商品は企業の成長の鍵となります。是非イスラム市場に活かしましょう。</p>
            </div>
          </li>
          <li>
            <img src="<?= get_template_directory_uri(); ?>/dist/img/supplier/image04.jpg" alt="海外企業との取引">
            <div class="secSupplierAbout__listText">
              <h4><span>＼ 商談・契約、どうすればいいの？ ／</span>海外企業との取引経験がない</h4>
              <p>海外との取引経験がなくても、商品掲載の翻訳〜商談までサポート致します。販路開拓やバイヤーマッチングなども行なっていますので、ご相談があればお気軽にご連絡ください。</p>
            </div>
          </li>
          <li>
            <img src="<?= get_template_directory_uri(); ?>/dist/img/supplier/image05.jpg" alt="海外へのPR">
            <div class="secSupplierAbout__listText">
              <h4><span>＼ 海外へのPRや外国語が苦手 ／</span>海外へのPR方法が分からない</h4>
              <p>海外へのPRや外国語が苦手な企業でも、商品の掲載〜宣伝方法までJIOHASがサポート致します。主に企業向けの商品開発担当者、バイヤーや企画、営業担当者の閲覧が多く、専門ニッチサイトとしては異例となる月間約15,000PVの訪問数があります。そして日本製ハラル商品に特化してグローバルに発信しているサイトは他にありません。</p>
            </div>
          </li>
        </ul>
      </div>
    </section>
    <section class="secSupplierNetwork">
      <div class="pageWidth">
        <h2><span>JIOHAS NETWORK</span>JIOHASの<br class="sp">グローバルネットワーク</h2>
        <div class="secSupplierNetwork__box">
          <img src="<?= get_template_directory_uri(); ?>/dist/img/supplier/image06.png" alt="グローバルネットワーク">
          <div class="secSupplierNetwork__boxText">
            <p>海外全24カ国に自社拠点、またはパートナー企業のネットワークを持っています。<br><br>
[海外グローバル支局]<br>
マレーシア・インドネシア・シンガポール・タイ・フィリピン・台湾・中国・バングラデシュ・インド・パキスタン・ウズベキスタン・トルクメニスタン・ＵＡＥ・バーレーン・オマーン・サウジアラビア・イラン・トルコ・エジプト・南アフリカ・セネガル・チュニジア・モロッコ・ナイジェリア</p>
          </div>
        </div>
      </div>
    </section>
    <section class="secSupplierContact">
      <div class="pageWidth">
        <div class="secSupplierContact__box">
          <p class="secSupplierContact__text01">一般社団法人ハラル・ジャパン協会　会員企業限定</p>
          <h2>初期費用・月額費用・掲載料</h2>
          <p class="secSupplierContact__text02"><em>0<span>円</span></em>＋ 成果報酬</p>
        </div>
        <p class="secSupplierContact__text03">詳細はお問い合わせフォームより<br class="sp">お問い合わせください。</p>
        <div class="secSupplierContact__link">
          <a href="<?= home_url('contact'); ?>" class="linkButton">CONTACT US</a>
        </div>
      </div>
    </section>
  </article>
  <script>
    var swiper = new Swiper('.swiper', {
      autoplay: {
        delay: 0,
      },
      loop: true,
      speed: 15000,
      allowTouchMove: false,
      spaceBetween: 5,
      centeredSlides: true,
      preventInteractionOnTransition: true,
    }); 
  </script>
<?php
get_footer('',['lang'=>'ja']);
