<?php
$jawabanDikirim = "submittedAnswers.csv";
$jawabanAsli = "actualAnswers.csv";

$dataDikirim = fopen($jawabanDikirim,"r");
$dataAsli = fopen($jawabanAsli, "r");
$nomor = 0;
$benar = 0
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E1</title>
</head>
<body>
   <table border="1">
    <tr>
        <td>Question</td>
        <td>Actual Answer</td>
        <td>Submitted Answer</td>
    </tr>
    <?php 
    while(($dikirim = fgetcsv($dataDikirim, 1000, ";")) !== FALSE && ($asli = fgetcsv($dataAsli, 1000, ";")) !== FALSE) {

      $yangBenar = ($asli == $dikirim) ? $benar = $benar + 1 : $benar
    ?>
       <tr>
          <td><?= ++$nomor ?></td>
          <td><?= $asli[0] ?></td>
          <td><?= $dikirim[0] ?></td>
       </tr>
    <?php } ?>
   </table>
   <p>Score :  <?= $yangBenar . "/" . $nomor?></p>
</body>
</html>