<!DOCTYPE html>
<html>
  <head>
    <title>tabarnakhiersoir.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/custom.css" rel="stylesheet">

<script>
function verifyForm(form) {
    var digits = form.digits.value;
    var message = form.message.value;
    var success = 1;
    if (!digits) {
        document.getElementById("digitsError").style.display = "block";
        form.digits.style.backgroundColor = "#FCDA90";
        form.digits.style.border = "1px orange solid";
        success = 0;
    }
    else {
        form.digits.style.backgroundColor = "";
        form.digits.style.border = "";
        document.getElementById("digitsError").style.display = "none";
    }
    if (!message) {
        document.getElementById("messageError").style.display = "block";
        form.message.style.backgroundColor = "#FCDA90";
        form.message.style.border = "1px orange solid";
        success = 0;
    }
    else {
        form.message.style.backgroundColor = "";
        form.message.style.border = "";
        document.getElementById("messageError").style.display = "none";
    }
    if(!success) {
        alert("The form is incomplete.  Please read the error message(s).");
        return false;
    }
   else {
       document.getElementById("successMsg").style.display = "block";
       return true;
    }
}
</script>
  </head>
  

  <body class="container" >

<?php

$mysqli = new mysqli("tabarnakhiersoir.db.9179378.hostedresource.com", "tabarnakhiersoir", "Tabarnak!13", "tabarnakhiersoir");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($stmt = $mysqli->prepare("INSERT INTO textes_general(text, area_code) VALUES (?,?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$text = urlencode($_POST['message']);
$area_code = $_POST['digits'];

if (!$stmt->bind_param("si", $text,$area_code)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!$stmt->execute()) {
    echo "";
}



?>

<div class="navbar navbar-fixed-top navbar-inverse">
<div class="navbar-inner"><a class="brand" href="index.php">tabarnakhiersoir.com</a>
<ul class="nav">
<li><a href="index.php">Textes</a></li>
<li class="divider-vertical"></li>
<li><a href="popular.php">Populaires</a></li>
<li class="divider-vertical"></li>
<li class="active"><a href="submit.php">Soumettre</a></li>
<li class="divider-vertical"></li>
<li><a href="apropos.html">A Propos</a></li>
</ul>
</div>
</div>


<form id="soumission" method="post" action="submit.php" onsubmit="return verifyForm(this);">

<h2>Soumettez votre texte insolite!</h2>

<fieldset>
     <label for="digits">Indicatif t&eacute;l&eacute;phonique </label> <input id="digits" name="digits" type="tel" maxlength="3" placeholder="XXX" /> <div id="digitsError" style="display:none;"><span style="color:red; font-size:15px;">N'oubliez pas votre indicatif!</span></div>
     <label>Votre texte</label> <textarea name="message" rows="8" placeholder="Ma jase qu'est bien le fun"></textarea> <div id="messageError" style="display:none;"><span style="color:red; font-size:15px;">Vous avez omis le texte. </span></div> <br /> 
     <button type="submit" class="btn" style="color: #A81B4A;">Publier</button></fieldset>

</form>
<p>En cliquant le bouton "Publier", vous agr&eacute;&eacute;ez &agrave; nos Termes et Conditions.</p>
<script src="http://code.jquery.com/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>


<script type="text/javascript">// <![CDATA[
$(document).ready(function () {
        $('ul.nav > li').click(function (e) {
            $('ul.nav > li').removeClass('active');
            $(this).addClass('active');                
        });            
    });
// ]]></script>


<p style="display: none; color:green;" id="successMsg">Votre texte a ete reçue et est en cours de traitement.</p>
</body>
</html>