<?php
 // delete.php
 require "yhteys2.php";
 if (isset($_GET["id"])) {
   $sql = "DELETE FROM keikkapaikat WHERE Keikapaikkaid=?";
   //echo $sql;
   $data = array($_GET["id"]);
   $stmt = $pdo->prepare($sql);
   $stmt->execute($data);
   header('Location: http://samarium/2008TiviPOk02/gabriel.mupapa/index.php?sivu=harj7&kansio=harj');
   exit;
 }
?>