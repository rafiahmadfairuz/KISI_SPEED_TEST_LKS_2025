<?php
$judul = isset($_POST['judul']) ? $_POST['judul'] : 'Dokumen';
$isi = isset($_POST['isi']) ? $_POST['isi'] : 'Isi dokumen di sini';

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=\"$judul.doc\"");

echo "<html>";
echo "<head><meta charset='UTF-8'></head>";
echo "<body>";
echo "<h1>$judul</h1>";
echo "<p>$isi</p>";
echo "</body>";
echo "</html>";
?>
