<!DOCTYPE html>
<html>
  <head>
<link rel="icon" 
      type="image/png" 
      href="http://tabarnakhiersoir.ca/img/flagship.png">
    <title>tabarnakhiersoir.ca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/custom.css" rel="stylesheet">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js">
  </script>

<script>
function verifyForm(form) {

    var digits = form.digits.value;
    var message = form.message.value;
    var email = form.email.value;
    var success = 1;
    
    
    if (!digits) {
        document.getElementById("digitsError").style.display = "block";
        form.digits.style.backgroundColor = "#FCDA90";
        form.digits.style.border = "1px orange solid";
        success = 0;
    }
    
    else {
        form.digits.style.backgroundColor = "";
        form.digits.style.border = "pink";
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
  
<?php include_once("analyticstracking.php") ?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-22700949-2', 'tabarnakhiersoir.ca');
  ga('send', 'pageview');

</script>

<?php

   
  



$mysqli = new mysqli("localhost", "tabarnak_main", "Tabarnak!13", "tabarnak_main");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($stmt = $mysqli->prepare("INSERT INTO textes_general(text, area_code) VALUES (?,?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$text = urlencode($_POST['message'])."<br/><br/>".urlencode($_POST['allreplies']);
$area_code = $_POST['digits'];

if (!$stmt->bind_param("si", $text,$area_code)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!$stmt->execute()) {
    echo "";
}
?>
<div class="navbar navbar-fixed-top navbar-inverse">
<div class="navbar-inner"><a class="brand" href="index.php">tabarnakhiersoir.ca</a>
<ul class="nav">
<li><a href="index.php">Textes</a></li>
<li class="divider-vertical"></li>
<li><a href="popular.php">Populaires</a></li>
<li class="divider-vertical"></li>
<li class="active"><a href="submit.php">Soumettre</a></li>
<li class="divider-vertical"></li>
<li><a href="apropos.php">A Propos</a></li>
</ul>
</div>
</div>


<!-- le_index -->
<div style="display:inline-block; text-align:center; width:100%; height:90px;"><ins class="adsbygoogle"
     style="display:inline-block;width:70%;height:90px"
     data-ad-client="ca-pub-4735696890523894"
     data-ad-slot="8514293285"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script><br/><br/></div>

<form id="soumission" method="post" action="submit.php" onsubmit="return verifyForm(this);">

<h3>C'est &agrave vous!</h3>

<fieldset>
     <div id="before"><label for="digits">Indicatif t&eacute;l&eacute;phonique </label> <input id="digits" name="digits" type="tel" maxlength="3" placeholder="XXX" /> <div id="digitsError" style="display:none;"><span style="color:red; font-size:15px;">N'oubliez pas votre indicatif!</span></div>
     <label>Votre texte</label> <textarea name="message" rows="4" placeholder="Mon texte"></textarea> <div id="messageError" style="display:none;"><span style="color:red; font-size:15px;">Vous avez omis le texte. </span></div> <br /> </div>
     <div class="reply"><a href="#" style="text-decoration:none;"> + Ajouter une r&eacuteponse </a> </div>
     <textarea type="text" id="allreplies" name="allreplies" style="display:none;" > </textarea>
     <input type="text" id="email" name="email" style="display:none;" />
     
     <button type="submit" id="submit" class="btn" style="color: #A81B4A;">Publier</button></fieldset>
<p>En cliquant le bouton "Publier", vous agr&eacute;&eacute;ez &agrave; nos Termes et Conditions.</p>
</form>
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

<script type = "text/javascript">
$(document).ready(function(){
  $i = 0;
  $('#submit').click(function(e){
    e.preventDefault;
    $reponse = '(' + $('.digits').val() + ')<br/>' + $('.reply').val();
    $('#allreplies').val($reponse);
    });
  
      
  $('.reply').click(function(){
    $i++;
    $('#before').append('<input class="digits" type="tel" maxlength="3" placeholder="XXX" /> <br/> <textarea class="reply" rows="3" placeholder="Mon texte"></textarea><br/>');
    });
  });
  </script>

<p style="display: none; color:green;" id="successMsg">Succ&egraves!</p>

<div style="display:inline-block; text-align:center; width:100%; height:90px;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- coconut -->
<ins class="adsbygoogle"
     style="display:inline-block;width:70%;height:90px;"
     data-ad-client="ca-pub-4735696890523894"
     data-ad-slot="8124013683"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>

<div style=" text-align:center; display:block; vertical-align: middle;
">
<?php 
include("bottom.php");
?>
</div>
</body>
</html>