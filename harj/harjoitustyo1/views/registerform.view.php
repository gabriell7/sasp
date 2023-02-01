<?php
include "./views/partials/head.php";
?>
<div class="h1">
<h1>Rekisteröidy</h1>

<?php
if(isset($message)) echo $message;
?>

<form method ="post">
<label for="nickname">kayttajatunnus</label><br>
<input id="kayttajatunnus" type ="text" name ="kayttajatunnus" required><br>

<label for ="password">Salasana</label><br>
<input id="kayttajatunnus" type="password" name="password" required><br>


<label for="email">Email</label><br>
<input id="kayttajatunnus" type="email" name="email" required><br>


<input id="kayttajatunnus" type="submit" value="Rekisteröi käyttäjä">
</form>


</Div>
<?php
include "./views/partials/end.php";
?>


<link rel="stylesheet" href="tyyli2.css" type="text/css">