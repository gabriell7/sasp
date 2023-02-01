$salasanaok
$lomakeok

<?php
if (isset($_POST["nimi"], $_POST["tunnus"], $_POST["salasana"])) {
	// käsittele muuttujat
	$nimi = htmlspecialchars($_POST["nimi"]);
	$tunnus = htmlspecialchars($_POST["tunnus"]);
	$salasana = htmlspecialchars($_POST["salasana"]);
	echo "Lähetettiin: $nimi , $tunnus, $salasana";
	// onko salasana riittävä?
	//- tarkista pituus ja sisältääkö numeron
	if(!preg_match('[0-9]+',$salasana)) {
		echo 'Syötä salasanaan numero';
	}
	else if (strlen($salasana) <6) {
		echo 'salasana liian lyhyt';
	}
	else {
		$salasanaok = true;
	}
	$lomakeok = true;
}


// jos lomake ei ok niin näytetään lomake
?>



    
<form method ="post">


    <label for="nimi"><b>nimi</b></label><br>
    <input type="text" placeholder="Enter name" name="nimi" required><br>


    <label for="tunnus"><b>käyttäjä tunnus</b></label><br>
    <input type="text" placeholder="käyttäjä tunnus" name="tunnus" required><br>
    
    <label for="salasana"><b>salasana</b></label><br>
    <input type="password" placeholder="Enter password" name="salasana" required><br>


    <label for="syntymäaika"><b>syntymäaika</b></label><br>
    <input type="date" placeholder="Enter syntymäaika" name="syntymäaika" required><br>
    
    <label for="puhelinnumero "><b>puhelinnumero </b></label><br>
    <input type="tel" placeholder="040 1234567"     name="puhelinnumero " required><br>
    
    <label for="sähköposti  "><b>sähköposti  </b></label><br>
    <input type="email" placeholder="Enter sähköposti" name="sähköposti  " required><br>
    
    <label for="käyttäjän kotisivu "><b>käyttäjän kotisivu </b></label><br>
    <input type="url" placeholder="käyttäjän kotisivu" name="käyttäjän_kotisivu " required><br>
   
    <label for="esittely  "><b>esittely  </b></label><br>
    <input type="text"  name="esittely" textarea rows="4" required><br>
   <input type="submit" placeholder="lisää tiedot">
   
   </form>
   
   
   <h4>13.2</h4>
	<?php
	if (isset($_POST["submit2"] )) {
		$nimi = $_POST["Tiedostonnimi"];
		$Sisalto = $_POST["Sisalto"];
		$myfile = fopen("./temp/$nimi.txt", "w") or die("Unable to open file!");
		fwrite($myfile, $Sisalto);
		fclose($myfile);
	}

 

?>
 

<form method ="post">


    <label for="Tiedoston nimi  "><b>Tiedoston nimi  </b></label><br>
    <input type="text"  name="Tiedostonnimi" textarea rows="4" required><br>
	
	<label for="Sisältö  "><b>Sisältö  </b></label><br>
    <input type="text"  name="Sisalto" textarea rows="4" required><br>
	 <input type="submit" name="submit2" value="tallennna tiedosto">
</form>


<h4>13.3</h4>
<?php
if (isset($_POST["submit"] )) {
	$target_dir = "temp/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	  if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	  } else {
		echo "File is not an image.";
		$uploadOk = 0;
	  }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	  echo "Sorry, file already exists.";
	  $uploadOk = 0;
	}
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	  echo "Sorry, your file is too large.";
	  $uploadOk = 0;
	}
	
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} 
	
	else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}

?>
<form  method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<h4>13.4</h4>




<h4>13.5</h4>

<?php
// lähetettinkö nimi ja palaute
if (isset($_POST["nimi"], $_POST["parannettavaa"],$_POST["selkee"],$_POST["mielyttava"] )) {
	// tee aluksi tiedosto:
	$file = fopen("./temp/data.csv","a");
	echo "testi";
	//aseta tiedot taulukkoon ja lisää tiedostolle:
	$data = array($_POST["nimi"], $_POST["selkee"], $_POST["mielyttava"], $_POST["parannettavaa"]);
	fputcsv($file, $data, ";");
	// sulje tiedosto
	fclose($file);
}
?>
<form method = "post">
   Nimi: <input type="text" name="nimi" value="<?php if (isset($nimi))echo $nimi;?>"> <br />

Oliko sivusto selkee: <input type="text" name="selkee" value="<?php if (isset($selkee)) echo $Selkee;?>"><br />

Oliko sivusto mielyttävä : <input type="text" name="mielyttava" value="<?php if (isset($mielyttava)) echo $mielyttava;?>"><br />

Mitä parannettavaa: <textarea name="parannettavaa" rows="5" cols="40"><?php if (isset($parannettavaa)) echo $Mitäparannettavaa;?></textarea><br />

<input type="submit" value="submit" /><br />
</form>