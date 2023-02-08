<h1>Harjoitus5</h1>
<h2>5.1</h2>
<?php
for($i = 1; $i <= 10; $i++) {
	echo "gabuu<br>"; 
}
?>

<h2>5.2</h2>
<?php
//Laadi ohjelma, joka tulostaa seuraavat viisi vuotta kuvaruudulle
 //Nykyisen vuoden saat selville funktiolla date('Y');


 for($i = 1; $i <= 5; $i++) { 
 $tulos = date ("Y") +$i; 
	 echo "$tulos<br>"; 
 }
 ?>
 
 <h2>5.3</h2>
 
 <?php
   if(isset($_POST["pituus"]) && isset($_POST["leveys"])) {
    $pituus = $_POST["pituus"];
    $leveys = $_POST["leveys"];

    $rivi = 0;
  while ($rivi < $pituus) {
    $col = 0;
    while ($col < $leveys) {
      echo "*";
      $col = $col + 1;
    }
    echo "<br>";
    $rivi = $rivi + 1;
  }

   }
 ?>
<form method ="post">
<label for="pituus">leveys </br />
<input type="number" name="pituus" step="0.1" /><br />
<label for ="leveys"leveys   name="leveys"> pituus</label><br />
<input type= "leveys" name="leveys" step="0.1" /><br />
<input type="submit" value="Laske" />
</form>


<h2>5.4</h2>
<?php
$etunimet = array("Timo", "Tero", "Tauno");
$sukunimet = array("Virtanen", "Salonen", "Nieminen");

for ($i = 0;$i < count($etunimet); $i++) {
	echo $etunimet [$i];
	}
?>	

<h2>5.5</h2>
<?php
$etunimet = array ("Timo","Tarha","Tauno","Tero","gabriel");

$sukunimet = array ("Virtanen","Saloenen","gabriel","Basso","Nieminen");
    
if(isset($_POST["arpoa"])) {
    /*$arpoa = htmlentities($_POST["$arpoa"]);*/
    

 $satu = rand(0,count($etunimet)-1);
 

 $satu2 = rand(0,count($sukunimet)-1);
 echo $etunimet[$satu] . " " . $sukunimet[$satu];
}
 ?>

<form method="post">
<label for="nimi">Arpoo nimi ja sukunimi</label><br>
<input type="submit" name="arpoa"><br>
</form>



<?php
  echo "<h2>5.6</h2>";
    $maat = array(
        array("Finland", "Helsinki", "5528737"),
        array("Sweden", "Stockholm", "10377781"),
        array("Norway", "Oslo", "5372191"),
        array("Denmark", "Copenhagen", "5809502"),
        array("Iceland", "Reykjavik", "343518")
    );
 
    echo "<table>";
        echo "<tr><th>Maa</th><th>Kaupunki</th><th>Väkiluku</th></tr>";
        for($i=0; $i<=count($maat)-1; $i++) {
            echo "<tr>";
            for($j=0;$j<=count($maat[$i])-1;$j++) {
                echo "<td>" . $maat[$i][$j] . "</td>";
            }
            echo "</tr>";
        }
    echo "</table>";
?>
