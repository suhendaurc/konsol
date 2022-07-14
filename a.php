<?php
require_once 'index.php';
?>

<html>
<form action="a.php" method="post">
İsim:<br/>
<input type="text" name="adi" required/><br>
Soyisim:<br/>
<input type="text" name="soyadi"/><br>
Yaş:<br/>
<input type="text" name="yasi"/><br>
Numara:<br/>
<input type="text" name="numarasi"/><br><br>
<input type="submit" name="ekle" value="Ekle"/><br>
<hr>
</form>
</html>

<?php

if(isset($_POST['ekle'])){
// Dışarıdan veri aktaracağımız zaman sorgu için prepare ile hazırlamam gerek
$veriEkle = $baglanti->prepare("INSERT INTO ogrenciler SET ogrenci_adi=:xx,ogrenci_soyadi=:yy,ogrenci_yasi=:zz,ogrenci_numarasi=:ww");
$veri = array(
"xx" => $_POST['adi'],
"yy" => $_POST['soyadi'],
"zz" => $_POST['yasi'],
"ww" => $_POST['numarasi']

);

$sonuc = $veriEkle->execute($veri);
if($sonuc){
	echo 'Veri Eklendi';
}else{
	echo 'HATA';
}
	
}






$abc = $baglanti->query("SELECT * FROM ogrenciler ORDER BY ogrenci_numarasi DESC",PDO::FETCH_ASSOC);


foreach($abc as $y){
	// her bir kayıt bana dizi gibi gelecek
	echo '<p style="color:red">'.$y['ogrenci_numarasi']." ".$y['ogrenci_adi']." ".$y['ogrenci_soyadi'].'</p>';
}