  <ul class="navbar sub-rubrik line-<?php echo $_GET['jn']?>">
  <?php
  $kalam = mysql_query("SELECT nama_menu, link FROM menu WHERE id_parent = (SELECT id_menu FROM menu WHERE link = '$_GET[jn]')");
  while($row = mysql_fetch_array($kalam)){
    echo "<li><a href='$row[link]'>$row[nama_menu]</a></li>";
  }
  ?>
</ul>
  <section class="container-fluid" style="background-color:white;">
		<section class="headline row">
			<?php
				$terkini=mysql_query("SELECT * FROM menu JOIN (kategori JOIN berita ON kategori.id_kategori = berita.id_kategori) ON menu.nama_menu = kategori.nama_kategori AND menu.id_parent = (SELECT id_menu FROM menu WHERE link = '$_GET[jn]') ORDER BY berita.id_berita DESC LIMIT 1");
				while($t=mysql_fetch_array($terkini)){
          $id_berita = $t['id_berita'];
          $tgl = tgl_indo($t['tanggal']);
          $jam = trans_jam($t['jam']);
			 echo"
			 <div id='owl-demo' class='owl-carousel owl-theme'>
			  	<div class='item'>
			  		<img src='http://harianamanah.com/foto_berita/$t[gambar]' alt='Header-$t[judul]'>
            <span class='judul-berita-utama'>
              <div class='caption-dt-jd'>
                <h3><a href='berita-$t[judul_seo]' title='$t[judul]'>$t[judul]</a></h3>
                <span class='tanggal-release home'>$t[hari], $tgl - $jam</span>
              </div>
            </span>
			  	</div>
        </div>"; }?>
		</section>
		<section class="daftar-artikel">
    <?php
    $artikel=mysql_query("SELECT * FROM menu JOIN (kategori JOIN berita ON kategori.id_kategori = berita.id_kategori) ON menu.nama_menu = kategori.nama_kategori AND menu.id_parent = (SELECT id_menu FROM menu WHERE link = '$_GET[jn]') AND berita.id_berita < $id_berita ORDER BY berita.id_berita DESC LIMIT 35");
    while($q=mysql_fetch_array($artikel))
    {
      $tgl = tgl_indo($q['tanggal']);
      $jam = trans_jam($q['jam']);
      if (strlen($q['judul']) > 60)
            {
              $hasil = substr($q['judul'], 0, 60)."&hellip;";
            }
            else
            {
              $hasil = $q['judul'];
            }
      echo "<article class= 'artikle' >
        <div class='list-picture'>
          <a href='berita-$q[judul_seo]'>
            <img class='picture lazy' src='assets/base_n.jpg' data-src='http://harianamanah.com/foto_small/$q[gambar1]' alt='$q[judul]'/>
          </a>
        </div>
        <div class='artikle-text' data-target='update' kode='$q[id_berita]'>
        <a href='$q[link]'class='link-kategori'>$q[nama_kategori]</a>
        <a href='berita-$q[judul_seo]' class='berita' title='$q[judul]'>$hasil</a>
        <p class='waktu-berita'>$q[hari], $tgl - $jam </p>
        </div>
      </article>
      ";}	?>
    </section>
    <section class="daftar-artikel" id="daftar-artikel"></section>
    <br>
    <?php 
    $kalam = mysql_query("SELECT color FROM menu WHERE link = '$_GET[jn]'");
    $base_color = mysql_fetch_array($kalam)?>
    <div id="more" style="display:block;border:3px solid <?php echo $base_color['color']?>;color:<?php echo $base_color['color']?>;padding:10px 15px;font-weight:bold;font-size:25px;text-align:center;">MUAT LAINNYA</div>
		<div class="iklan">
            <a href="http://abutours.com" title="AbuTours.com">
                <!-- <img class="img-responsive" src="assets/abujie.jpg" alt="iklan"> -->
            </a>
    </div>
		<section id="daftar-artikel"></section>
		<div id="more" style="display: none;">
			<center><img src="assets/loading.gif" width="100px"></center>
		</div>
    </section>
    <section class="container-fluid" style="background:#fff; padding:0 5px;">
      <center>
        <h1 style="display:inline-block;border-bottom:3px solid red;margin-bottom:30px;">POPULAR</h1>
      </center>
      <ul class="col-xs-12 rubrik-popular top-<?php echo $_GET['jn']?> ">
        <?php
          $popular = mysql_query("SELECT * FROM berita, menu WHERE berita.id_kategori = menu.id_menu AND id_parent = (SELECT id_menu FROM menu WHERE link = '$_GET[jn]') ORDER BY dibaca DESC LIMIT 10");
          while($row = mysql_fetch_array($popular))
          {
            echo "<li class='top-popular'><a href='berita-$row[judul_seo]'>$row[judul]</a></li>";
          }
        ?>
      </ul>
    </section>
    <section class="container-fluid" style="background:#fff;padding:0;">
    <?php
      $rubrik = mysql_query("SELECT nama_menu, link, gradient FROM menu WHERE id_parent = '0' AND link != '$_GET[jn]' AND aktif = 'Ya'");
      while($main = mysql_fetch_array($rubrik))
      {
        echo "<article class=\"container-fluid\" style='padding:0; $main[gradient]'><h2 style='text-align:right;margin:7px 5px;text-transform:uppercase;font-weight:bold;font-size:25px;'><a href='$main[link]' title='$main[nama_menu]' style='color:#fff;'>$main[nama_menu]</a></h2>";
        $artikel = mysql_query("SELECT judul_seo, judul, gradient, color, background, hari, tanggal, jam, gambar FROM menu m JOIN (kategori k JOIN berita b ON k.id_kategori = b.id_kategori) ON m.nama_menu = k.nama_kategori AND m.id_parent = (SELECT id_menu FROM menu WHERE link = '$main[link]') ORDER BY id_berita DESC LIMIT 1");
        while($fill = mysql_fetch_array($artikel))
        {
          $tgl = tgl_indo($fill['tanggal']);
          $jam = trans_jam($fill['jam']);
          echo "
          <div class=\"content-image\" style='position:relative;'>
            <img src=\"http://harianamanah.com/foto_berita/$fill[gambar]\" width='100%' alt=\"$fill[judul]\" style='object-fit:cover;height:215px;'>
            <div>
            <span class='judul-berita-utama'>
              <div class='caption-dt-jd'>
                <h3><a href='berita-$fill[judul_seo]' title='$fill[judul]'>$fill[judul]</a></h3>
                <span class='tanggal-release home'>$fill[hari], $tgl - $jam</span>
              </div>
            </span>
            </div>
          </div>";
        }
        echo "</article>";
      }
    ?>
    </section>
    <script>
      $(document).ready(function(){
        // var loadMore = true;
        // $(window).scroll(function(){
        //   var nearbottom = 100;
        //   if($(window).scrollTop()+nearbottom >= $(document).height() - $(window).height() && loadMore)
        //   {
        //     loadMore = false;
        //     $.ajax({
        //       method: 'GET',
        //       url: 'more.php',
        //       data: {
        //         kategori: '<?php echo $_GET['jn']?>',
        //         urut: $('.artikle-text:last').attr('kode')
        //       },
        //       beforeSend: function()
        //       {
        //         $('#more').show();
        //       },
        //       complete: function()
        //       {
        //         $('#more').hide().delay(1000);
        //       },
        //       success: function(result)
        //       {
        //         if(result)
        //         {
        //           $('#daftar-artikel').append(result);
        //           loadMore = true;
        //           // $('#more')('<div class="more">MUAT LAINNYA</div>');
        //           // $('.iklan')('<a href="https://abutours.com/" target="_blank" title="AbuTours.com"><img class="img-responsive" src="../foto_iklantengah/917737Iklan-Web-Amanah-2.gif" alt="iklan"></a>');
        //         }
        //       }
        //     });
        //   }
        // });
        $('#more').click(function(){
        	$.ajax({
            method: 'GET',
        		url: 'more.php',
            data: {
              kategori:'<?php echo $_GET['jn']?>',
              urut:$('.artikle-text:last').attr('kode'),
            },
            beforeSend: function(){
              $(this).hide().delay(6000);
            },
        		success: function(html)
        		{
        			if(html)
        			{
        				$('#daftar-artikel').append(html);
                $('.lazy').lazy();
        				$('#more').show();
        			}
        		}
        	})
        });
      });
    </script>