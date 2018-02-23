<?php
  define ('SITE_URL', site_URL());

  $automobile = new Mobile_Detect;
  $pop = array_pop(explode('/', $_SERVER['REQUEST_URI']));
  if($automobile->isMobile()){
    header('Location: http://m.harianamanah.com/'.$pop);
    exit();
  }
  error_reporting(0);

  $detail=mysql_query("SELECT * FROM berita,users,kategori
        WHERE users.id=berita.username
        AND kategori.id_kategori=berita.id_kategori
        AND judul_seo='$_GET[judul]'");
    $d   = mysql_fetch_array($detail);
    $tgl = tgl_indo($d['tanggal']);

  $meta = new meta;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html" />
  <meta http-equiv="content-language" content="In-Id">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
  <meta http-equiv="refresh" content="900">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <meta name="author" content="harianamanah.com">
  <meta name="robots" content="index, follow" />
  <meta name="googlebot" content="index, follow" />
  <meta name="googlebot-news" content="index, follow" />
  <meta name="keywords" content>
  <meta name="news_keywords" content>
  <meta name="language" content="id">
  <meta name="geo.placename" content="Indonesia">
  <meta name="geo.country" content="id">
  <meta name="title" content="<?= $meta->meta_title($_GET['menu'], $_GET['id'], $_GET['judul'], $_GET['module']); ?>" />
  <meta name="description" content="<?= $meta->meta_description($d['isi_berita']); ?>" />
  <meta name="image" content="<?= $meta->meta_image($d['gambar'])?>" />
  <title><?= $meta->meta_title($_GET['menu'], $_GET['id'], $_GET['judul'], $_GET['module']); ?></title>
  <meta property="og:title" content="<?= $meta->meta_title($_GET['menu'], $_GET['id'], $_GET['judul'], $_GET['module']); ?>" />
  <meta property="og:description" content="<?= $meta->meta_description($d['isi_berita']); ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="<?= $meta->meta_seo_title($d['judul_seo'])?>" />
  <meta property="og:image" content="<?= $meta->meta_image($d['gambar'])?>" />
  <meta property="og:image:alt" content="<?= $meta->meta_title($_GET['menu'], $_GET['id'], $_GET['judul'], $_GET['module']); ?>">
  <meta property="og:image:width" content="600">
  <meta property="og:image:height" content="315">
  <meta property="og:site_name" content="harianamanah.com" />
  <meta property="og:locale" content="id_ID" />
  <meta property="fb:app_id" content="490830364408744" />
  <meta property="fb:pages" content="490830364408744" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@harianamanah" />
  <meta name="twitter:site:id" content="@harianamanah" />
  <meta name="twitter:creator" content="@harianamanah" />
  <meta name="twitter:title" content="<?= $meta->meta_title($_GET['menu'], $_GET['id'], $_GET['judul'], $_GET['module']); ?>" />
  <meta name="twitter:url" content="<?= $meta->meta_seo_title($d['judul_seo'])?>" />
  <meta name="twitter:description" content="<?= $meta->meta_description($d['isi_berita']); ?>" />
  <meta name="twitter:image" content="<?= $meta->meta_image($d['gambar'])?>" />

  <!-- Bootstrap Core CSS -->
  <link rel="shortcut icon" type="image/png" href="<?= SITE_URL?>favicon.png">
  <link rel="stylesheet" href="<?= SITE_URL;?>css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="<?= SITE_URL;?>font-awesome-4.7.0/css/font-awesome.min.css"  type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700,900">
  <link rel="stylesheet" href="<?= SITE_URL;?>css/structure.css?v=1.01">
  <link rel="stylesheet" href="<?= SITE_URL;?>css/style.css?v=1.01">
  <link rel="stylesheet" href="<?= SITE_URL;?>css/new.css?v=1.01">
  <script src="<?= SITE_URL;?>js/jquery-2.1.1.js"></script>
  
  <!-- <script type="application/ld+json">
  {
    "@context": "http://schema.org/",
    "@type": "NewsArticle",
    "headline": "<?php
      if($d['judul'] !=''){
        echo "$d[judul]";
      }else{
        echo "Kiblat Berita Islami - harianamanah.com";
      }?>",
    "datePublished": "<?= $d['tanggal']?>",
    "description": "<?php
  if($d['isi_berita'] != '')
    echo desc($d['isi_berita']);
  else
    echo "Indeks berita islam terkini dari Dunia islam, Olahraga, Tekno, Ekonomi, Jazirah, politik, halal destination, Islamic View, berita haji dan umroh dan international";
  ?>",
    "image": {
      "@type": "ImageObject",
      "height": "315",
      "width": "600",
      "url": "<?php
  if($d['gambar']!=''){
    echo "http://harianamanah.com/foto_berita/$d[gambar]";
  }else{
    echo "http://harianamanah.com/images/amanah.jpg";
  }
  ?>"
    },
    "author": "harianamanah",
    "publisher": {
      "@type": "Organization",
      "logo": {
        "@type": "ImageObject",
        "url": "http://harianamanah.com/logo/assets/pp_ff.png"
      },
      "name": "harianamanah"
    }
  }
  </script> -->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
  <![endif]-->
<?php
  include_once "heatmap.php";
  include_once "analyticstracking.php";
  include_once "adsense.php";
  ?>
</head>
<body>
<header>
  <!--Navigation-->
  <nav id="menu" class="navbar navbar-default navbar-fixed-top">
    <div class="row header-row-logo-bulat">
      <div class="container" style="padding:0;">
        <a href="/" style="display:inline-block; padding:13px 30px 13px 0;border-right:1px solid rgba(38, 41, 50, 0.12);">
          <img src="<?= SITE_URL?>logo/assets/pp_ff.png" width="30" alt="Logo bulat Amanah - harianamanah.com">
        </a>
        <div id="cari">
          <div class="mid1">
          <form method="GET" action="search">
            <input type="text" name="query-search" placeholder='Cari berita dan peristiwa'>
            <button><i class="fa fa-circle-thin"></i></button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <nav id="logo" class="navbar navbar-default" style="background-color:#fff;">
    <div class="row">
      <div class="container" style="padding:0;">
        <a href="/">
          <div class="logo"><img src="<?= SITE_URL?>images/amanah.png" width="400px" alt="Logo Amanah - harianamanah.com"></div>
        </a>
      <div style="vertical-align:middle;display:inline-block;">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Banner Top Ads -->
        <ins class="adsbygoogle"
            style="display:inline-block;width:640px;height:95px"
            data-ad-client="ca-pub-4290882175389422"
            data-ad-slot="5899334806"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        </div>
      </div>
    </div>
    <?php
      if($_GET['menu']):
        $color = mysql_fetch_array(mysql_query("SELECT gradient, color, link FROM menu WHERE link = '$_GET[menu]'"));
      elseif($_GET['judul']):
        $color = mysql_fetch_array(mysql_query("SELECT gradient, color, link FROM menu WHERE id_menu = (SELECT id_parent FROM menu WHERE id_menu = (SELECT id_kategori FROM berita WHERE judul_seo = '$_GET[judul]'))"));
      elseif($_GET['id']):
        $color = mysql_fetch_array(mysql_query("SELECT gradient, color, link FROM menu WHERE id_menu = (SELECT id_parent FROM menu WHERE id_menu = '$_GET[id]')"));
      else:
        $color = ["color" => "#1c9fa7"];
      endif;
    ?>
    <div class="row">
    <div class="container nav-menu" style="padding:0;<?= $color['gradient']?>">
      <div class="navbar-header">
        <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
      </div>
      <div class="collapse navbar-collapse navbar-ex1-collapse" style="padding:0;position:relative;">
        <ul class="nav navbar-nav" style="position:relative;">
        <?php
          $result = mysql_query("SELECT * FROM menu WHERE aktif='Ya' AND id_parent='0' ORDER BY menu_order");
          while( $row = mysql_fetch_array($result)):
        ?>
          <li data-caption ="<?= $row['link']?>" class="main-menu" style="position:static;">
            <a href="<?= SITE_URL.'kategori/'.$row['link']?>" style="color:#fff;font-size:17px;padding:13px 15px;font-weight:bold;text-transform:uppercase;" ><?= $row['nama_menu']?></a>
              <ul class="menu-show sub-nav-menu <?= strtolower($row['link']) ?>">
                <li class="sub__rubrik col-lg-3" style="border-right:1px solid rgba(0, 0, 0, 0.25);">
                <?php
                  $sub_rubrik = mysql_query("SELECT link, nama_menu FROM menu WHERE id_parent = '$row[id_menu]' AND aktif = 'Ya'");
                  while($row_sub = mysql_fetch_array($sub_rubrik)):
                    echo "<a href='".SITE_URL.$row_sub[link]."' style='font-size:15px;font-weight:bolder;padding:7px 0;display:block;'>$row_sub[nama_menu]</a>";
                  endwhile;
                ?>
                </li>
                <li class="col-lg-9" style="padding-left:25px;">
                <?php
                $query = mysql_query("SELECT judul, judul_seo, gambar FROM berita, menu WHERE id_kategori = id_menu AND id_parent = '$row[id_menu]' ORDER BY id_berita DESC LIMIT 4");
                while($img_news = mysql_fetch_array($query)):
                ?>
                  <div class="mega_menu_img">
                    <a href="<?= SITE_URL.'berita-'.$img_news['judul_seo'] ?>" style="display:inline-block;">
                      <img class="lazy reset_img" src="<?= SITE_URL; ?>foto_statis/base.jpg" data-src="http://harianamanah.com/foto_berita/<?= $img_news['gambar']?>" alt="<?= $img_news['judul']?>">
                    </a>
                    <a class="caption" href="<?= SITE_URL.'berita-'.$img_news['judul_seo'] ?>"><?= $img_news['judul']?></a>
                  </div>
                <?php endwhile; ?>
                </li>
              </ul>
            </li>
        <?php endwhile;?>
        </ul>
        <ul class="sub-nav-menu sub-menu-rubrik menu-show">
        <?php
          if($_GET['menu']):
            $sub_rubrik = mysql_query("SELECT nama_menu, link FROM menu WHERE id_parent = (SELECT id_menu FROM menu WHERE link = '$_GET[menu]')");
          elseif($_GET['judul']):
            $sub_rubrik = mysql_query("SELECT nama_menu, link FROM menu WHERE id_parent = (SELECT id_parent FROM menu WHERE id_menu = (SELECT id_kategori FROM berita WHERE judul_seo = '$_GET[judul]'))");
          elseif($_GET['id']):
            $sub_rubrik = mysql_query("SELECT nama_menu, link FROM menu WHERE id_parent = (SELECT id_parent FROM menu WHERE id_menu = '$_GET[id]')");
          endif;
          
          while($row_sub = mysql_fetch_array($sub_rubrik)):
              echo "
              <li class=\"sub__rubrik\">
                <a href='".SITE_URL.$row_sub[link]."' style='font-size:13px;font-weight:bold;padding:10px 15px;;display:inline-block;'>$row_sub[nama_menu]</a>
              </li>";
          endwhile;
          echo "</ul>";
        ?>
      </div>
      </div>
    </div>
  </nav>
  <div class="clearfix"></div>
</header>
<?php 
  include_once "embed.php";
  include_once "konten.php"; 
?>
<footer>
  <div class="footer-logo">
    <div class="gambar-footer">
      <a href="/" class="go-top"><span class="fa fa-angle-up" aria-hidden="true" style="color:#1f2126;"></span></a>
    </div>
  </div>
  <div class="footer-menu-expand">
    <div class="container">
    <ul class="menu-utama">
      <li class="kategori">
        <!-- <span class="title-menu">KANAL</span> -->
        <ul>
        <?php
          $menu_sub = mysql_query("SELECT link, nama_menu FROM menu WHERE aktif='Ya' AND id_parent != 0;");
          while($row = mysql_fetch_array($menu_sub)){
            echo "<li><a href='".SITE_URL.$row[link]."'>$row[nama_menu]</a></li>";
          }
          ?>
        </ul>
      </li>
    </ul>
    </div>
  </div>
  <div class="footer-menu">
    <div class="container">
      <ul class="must-know">
        <li><a style="color:#eee;" href="<?= SITE_URL?>hal-tentang-kami">TENTANG KAMI</a></li>
        <li><a style="color:#eee;" href="<?= SITE_URL?>hal-redaksi">REDAKSI</a></li>
        <li><a style="color:#eee;" href="<?= SITE_URL?>hal-privacy-policy">KEBIJAKAN PRIVASI</a></li>
        <li><a style="color:#eee;" href="<?= SITE_URL?>hal-kontak-kami">KONTAK</a></li>
        <li><a style="color:#eee;" href="<?= SITE_URL?>sitemap">SITEMAP</a></li>
      </ul>
      <ul class="menu-utama">
        <li style="text-align:right;">
          <ul class="block" style="display:block;">
            <li><a href="https://www.facebook.com/harianamanah/" target="_blank"><i class='fa fa-fw fa-facebook'></i></a></li>
            <li><a href="https://twitter.com/harianamanah" target="_blank"><i class='fa fa-fw fa-twitter'></i></a></li>
            <li><a href="https://www.instagram.com/harian_amanah/" target="_blank"><i class='fa fa-fw fa-instagram'></i></a></li>
            <li><a href="https://plus.google.com/115045050828571942973" target="_blank"><i class='fa fa-fw fa-google-plus'></i></a></li>
            <li><a href="https://www.linkedin.com/company/13466134"><i class='fa fa-fw fa-linkedin'></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCyk4N4qJdhduvO697WQKc1w" target='_blank'><i class='fa fa-fw fa-youtube'></i></a></li>
          </ul>
        </li>
        <li>
          <ul class="block-2">
            <li>
              <a href="https://play.google.com/store/apps/details?id=com.koran.harian.amanah&hl=in" text-decor="none" target="_blank" >
                <img src="<?= SITE_URL?>images/googleplay.png" alt="android" style="width:140px">
              </a>
            </li>
            <li>
              <a href="https://itunes.apple.com/id/app/harian-amanah/id1186655456?mt=8" text-decor="none" target="_blank">
                <img src="<?=SITE_URL?>images/appstore.png" alt="apple" style="width:140px">
              </a>
            </li>
          </ul>w
        </li>
      </ul>
    </div>
  </div>
  <div class="copy-right">
    <div class="container">
      <p style="margin:0;">2015&nbsp;&#45;&nbsp;2018&nbsp;&copy;&nbsp;PT. Harian Amanah Alharam - All Rights Reserved.</p>
    </div>
  </div>
	</footer>
	<!-- Footer -->
  <!-- JS -->
  <!-- jQuery and Modernizr-->
  <script src="<?= SITE_URL; ?>js/bootstrap.min.js"></script>
  <script src="<?= SITE_URL; ?>js/jquery.lazy.min.js"></script>
  <script src="<?= SITE_URL; ?>js/jquery.lazy.plugins.min.js"></script>
  <script src="<?= SITE_URL; ?>js/jquery-scrolltofixed-min.js"></script>
  <script src="<?= SITE_URL; ?>js/ha.js?v=1.01"></script>
</body>
</html>