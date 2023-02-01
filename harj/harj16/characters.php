<!DOCTYPE html>
<html>
<head>
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<form>
<select name="users" onchange="showUser(this.value)">
<option value="">valitse hahmo:</option>
<option value="1">soturi</option>
<option value="2">velho</option>
<option value="3">titan</option>
<option value="4">titan66</option>
</select>
</form>
<br>
<div id="txtHint"><b>Hahmon static.</b></div>

</body>
</html>