<?php
include "./views/partials/head.php";
if(isset($message)) echo $message;
?>

<form method ="post">

<label for="email">email</label><br>
<input id="kayttajatunnus" type="text" name="email"><br>

<label for="password">Salasana</label><br>
<input id="kayttajatunnus" type="password" name="salasana"><br>

<input id="kayttajatunnus" type="submit" value="Kirjaudu">
</form>

<?php
include "./views/partials/end.php";
?>


