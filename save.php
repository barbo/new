<table width="410" height="710" bgcolor="#000000" border="0" cellspacing="8" cellpadding="8" align="center">

<table width="400" height="700" bgcolor="#f4f4f4" border="0" cellspacing="8" cellpadding="8" align="center">
<td>
<center>
<?php
# Resimleri cek
$dizin = "layout";//Resminizin Bulunduðu Yolu Yazýnýz
$tutucu = opendir($dizin);
while($dosya = readdir($tutucu)){
if(is_file("layout/".$dosya))
$resim[] = $dosya;
}
closedir($tutucu);

# Ön bilgiler
$limit = 21; //Bir sayfada gösterilecek resim sayýsý
$sf = $_GET["sf"];
if($sf < 1) $sf = 1;
$toplam = count($resim);

# Bu bilgiler doðrultusunda
$kactan = ($sf-1) * $limit;
$kaca = ($kactan+$limit);
if($kaca > $toplam) $kaca = $toplam;

# $kactan baþlayýp $kaca kadar resim bas
for($i=$kactan; $i < $kaca; $i++){
echo "
<a href='".$dizin."/".$resim[$i]."' target='_blank'>
<img onContextMenu='return false' src='".$dizin."/".$resim[$i]."' width='100' height='100' border='0'></a>\n";
}
echo" </br></br></br>";
# Birden baþlayýp sayfa sayýsý kadar link bas
for($i=1; $i < $toplam / $limit; $i++){
if($sf == $i)
echo "$in"; else
echo "<a href='resim.php?sf=$i'>$i</a>\n";
}
?>
</center><tr></td></tr></table>
<tr></td></tr></table>
<!--
----
Not:
------------------------------

onContextMenu='return false'

bu kod resminizin kopyalanmasýný engeller.
Dilerseniz kaldýrabilirsiniz

-------------------------------


<a href='".$dizin."/".$resim[$i]."' target='_blank'></a>

Yukarýdaki kodlarla resimlere ayrý ayrý link verdik
target='_blank'
ile resimleri farklý sayfada açtýk 


-->