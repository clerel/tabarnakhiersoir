<!DOCTYPE html>
<html>
  <head>
    <title>tabarnakhiersoir.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/custom.css" rel="stylesheet">
  </head>
  <body class="container" >
<p><a href="http://jquery.com/">jQuery</a></p>
<script src="jquery-1.10.2.min.js" type="text/javascript"></script>
<script type="text/javascript">// <![CDATA[

// ]]></script>
<div class="navbar navbar-fixed-top navbar-inverse">
<div class="navbar-inner"><a class="brand" href="index.php">tabarnakhiersoir.com</a>
<ul class="nav">
<li><a href="index.php">Textes</a></li>
<li class="divider-vertical"></li>
<li><a href="popular.php">Populaires</a></li>
<li class="divider-vertical"></li>
<li><a href="submit.php">Soumettre</a></li>
<li class="divider-vertical"></li>
<li class="active"><a href="apropos.html">A Propos</a></li>
</ul>
</div>
</div>
<h1>Calisse</h1>
<p>Pour le Grand Montreal qui vibre. </p>
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
<?php 
include("bottom.php");
?>
</body>
</html>