<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>PHP Quiz</title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<?php 
error_reporting(0);
?>
<body>

	<div id="page-wrap">
    <br>
		<font color="pink"><h2>KUIS Tebak Apakah kamu Jomblo atau bukan?</h2></font>
	<br>
		<form action="grade.php" method="post" id="quiz">
		
            <ol>
            
                <li>
                
                    <h3>Kapan terakhir kali kamu bilang "i Love You"?</h3>
                    <br>
                    <img src="love.jpeg"  width="450px"/>
                    <br>
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                        <label for="question-1-answers-A">A) Tahun Lalu </label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                        <label for="question-1-answers-B">B) 5 Menit yang lalu</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                        <label for="question-1-answers-C">C) iiih KEPO deh!</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                        <label for="question-1-answers-D">D) Tidak Pernah</label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3>Berapa Kali sepekan anda hangout atau jalan keluar seperti, cafe, bioskop, flyover, dsb. ? </h3>
                     <br>
                     <img src="jalan.jpg"  width="450px"/>
                    <br>
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                        <label for="question-2-answers-A">A) 1 kali sepekan</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                        <label for="question-2-answers-B">B) Tiap Hari dong!</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                        <label for="question-2-answers-C">C) iiiih sori yah kita nongkrong di taman makam pahlawan dong..</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
                        <label for="question-2-answers-D">D) Jarang.... -__-</label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3>Kalau ke nikahan teman kamu pergi bareng?</h3>
                    <br>
                      <img src="kondangan.jpg"  width="450px"/>
                    <br>
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                        <label for="question-3-answers-A">A) Bareng Teman Geng</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                        <label for="question-3-answers-B">B) Sendirian Wakili Ortu</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                        <label for="question-3-answers-C">C) Istri Orang</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                        <label for="question-3-answers-D">D) Bareng siapa aja boleh</label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3>Setiap Malam Minggu Kamu Ngapain?</h3>
                    <br>
                      <img src="satnite.jpg"  width="450px"/>
                    <br>
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                        <label for="question-4-answers-A">A) Jalan Bareng Do'i</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                        <label for="question-4-answers-B">B) Jalan Bareng teman-teman dong ...</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-C" value="C" />
                        <label for="question-4-answers-C">C) Ngukur Jalanan</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-D" value="D" />
                        <label for="question-4-answers-D">D) Jaga Lilin, hiks! :')</label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3>Website Berita Paling OK dan berpotensi besar ?</h3>
                    <br>
                      <img src="loading.gif"  width="450px"/>
                    <br>
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
                        <label for="question-5-answers-A">A) Harianamanah.id</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
                        <label for="question-5-answers-B">B) Harianamanah.id</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
                        <label for="question-5-answers-C">C) Harianamanah.id</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
                        <label for="question-5-answers-D">D) Harianamanah.id</label>
                    </div>
                
                </li>
            
            </ol>
            
            <input type="submit" value="Lihat Hasil" />
		
		</form>
	
	</div>
	
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	var pageTracker = _gat._getTracker("UA-68528-29");
	pageTracker._initData();
	pageTracker._trackPageview();
	</script>

</body>

</html>