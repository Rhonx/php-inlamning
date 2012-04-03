<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>registera dig här</title>
    <link href="fanpage.css" type="text/css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Shojumaru' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="regmain">
<h1>Vänligen fyll i formuläret nedan</h1>
<a href="fanpage.php" class="links">Tillbaka till huvudsidan</a>
<form action="reg2.php" id="reg_form" method="post">
<fieldset>
<h4>Inloggningsuppgifter</h4>
<p><label class="labbe" for="a_name">Användarnamn:</label>
<input type="text" id="a_namn" name="a_namn" value="">tecken tillåtna (a-z, A-Z, 0-9)</p>
<p><label class="labbe" for="pass" id="pass" value="">Lösenord:</label>
<input type="password" id="pass" name="pass">mellan 6-10 tecken</p>
<p><label class="labbe" for="re_pass" id="" name="re_pass">Upprepa Lösen:</label>
<input type="password" id="re_pass" name="re_pass" value=""></p>
<p><label class="labbe" for="e_mail">E-post adress</label>
<input type="email" id="" name="e_mail">Email för att återfå lösenord/användarnamn</p>
</fieldset>
<fieldset>
<h4>Personlig information</h4>
<p><label class="labbe" for="f_namn">Förnamn:</label>
<input type="text" id="" name="fnamn"></p>
<p><label class="labbe" for="e_namn">Efternamn:</label>
<input type="text" id="" name="enamn"></p>
<label class="labbe" for="man" id="male">Man</label>
<input type="radio" id="male" name="val" value="man" />
<label class="labbe" for="kvinna" id="women">Kvinna</label>
<input type="radio" id="women" name="val" value="kvinna" />
<p><label class="labbe" for="age1">Ålder:</label>
<input type="number" id="age1" name="age1" value="14" step="1"/></p>
<input type="submit" id="skicka" name="submit" value="Registrera"/>
</fieldset>
</form> 
</div>
</body>
<script>
</script>
</html>
