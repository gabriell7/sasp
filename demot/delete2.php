<?php
 // delete.php
 require "yhteys.php";
 if (isset($_GET["id"])) {
   $sql = "DELETE FROM Keikkapaika WHERE keikkapaikkaid=?";
   $data = array($_GET["id"]);
   $stmt = $pdo->prepare($sql);
   $stmt->execute($data);
  header('Location: ../index.php?sivu=harj7php&kansio=harj');
   exit;
 }
?>