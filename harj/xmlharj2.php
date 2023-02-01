<h1>harj 2<h1>



<?php
// uusi DOMDocument
$dom = new DOMDocument();
$dom->encoding = 'utf-8';
$dom->xmlVersion = '1.0';
$dom->formatOutput = true;
$xml_file_name = 'pelaajat.xml';

// luodaan juurielementti    
$root = $dom->createElement('pelaaja');

// luodaan ruoka-elementti
$pelaaja = $dom->createElement('pelaaja');
$attr_pelaaja_id = new DOMAttr('id', '1');
$pelaaja->setAttributeNode($attr_pelaaja_id);

// ruoka-elementin lapset
$lapsi1 = $dom->createElement('name', 'Lebron James ');
$pelaaja->appendChild($lapsi1);

$lapsi2 = $dom->createElement('age', 36);
$pelaaja->appendChild($lapsi2);

$lapsi3 = $dom->createElement('height', '2.03');
$pelaaja->appendChild($lapsi3);

$lapsi4 = $dom->createElement('img', '');
$pelaaja->appendChild($lapsi4);

// ruoka juurielementille
$root->appendChild($pelaaja);


$pelaaja = $dom->createElement('pelaaja2');
$attr_ruoka_id = new DOMAttr('id', '2');
$pelaaja->setAttributeNode($attr_ruoka_id);

// ruoka-elementin lapset
$lapsi1 = $dom->createElement('name', 'giannis Antentokounbo');
$pelaaja->appendChild($lapsi1);

$lapsi2 = $dom->createElement('age', 26);
$pelaaja->appendChild($lapsi2);

$lapsi3 = $dom->createElement('height', '2.07');
$pelaaja->appendChild($lapsi3);

// ruoka juurielementille
$root->appendChild($pelaaja);


$dom->appendChild($root);

$dom->save($xml_file_name);

echo "$xml_file_name -tiedosto kirjoitettu";
?>

<h3> 2. Tiedoston lukeminen<h3>

<?php
$xml=simplexml_load_file("pelaajat.xml") or die("Error: tiedosto!");

foreach($xml->children() as $pelaaja) {
  echo $pelaaja->name . ", age: ". $pelaaja-> age. "<br>";
}
