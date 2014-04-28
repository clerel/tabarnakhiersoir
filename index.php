<?php 
session_start();

if (!$_SESSION['visited']){
$_SESSION['visited']=array("table");
}

if (!$_SESSION['visited2']){
$_SESSION['visited2']=array("table");
}

function get_ip_address(){
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $ip){
                $ip = trim($ip); // just to be safe

                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                    return $ip;
                }
            }
        }
    }
}
$_SESSION['id2'] =  get_ip_address();
?>


<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">
  <head profile="http://www.w3.org/2005/10/profile">
<link rel="icon" 
      type="image/png" 
      href="http://tabarnakhiersoir.ca/img/flagship.png">
    <title>tabarnakhiersoir.ca - Textos Insolites</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:image" content="http://tabarnakhiersoir.ca/img/flagship.png"/>


    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">

   
    
    <script>
function add_dislike(str)
{
if (str=="")
  {
  document.getElementById("dislikes"+str).innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("dislikes"+str).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","downvotecount.php?q="+str,true);
xmlhttp.send();
}
function add_like(str)
{
if (str=="")
  {
  document.getElementById("likes"+str).innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("likes"+str).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","upvotecount.php?q="+str,true);
xmlhttp.send();
}

</script>
    
    <!-- In-page CSS -->
<style type="text/css">
.social:hover
{
background-color:#FCDA90; 
}

.comments{color:rgb(87,10,37); }

.comments:hover
{
color: pink;
text-decoration:none;
}

.appreciation
{
  margin-right: 5px;
  margin-top:5px;
float: left;
color:rgb(87,10,37); 
font-weight:200; 
font-size:75%; 
height:20px; 
width: 100px;
text-align: center; 
background-color: #FCDA90; 
background-size: 20px auto;
vertical-align: middle;
padding:auto;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
}

.appreciation > a:hover
{
text-decoration: none;
color:#A81B4A;
}

.appreciation:hover
{
color:#A81B4A;
background-color:pink;
text-decoration:none;
}
</style>
    
  </head>


  <body class="container" >
  
  <!-- FB JVSCRPT SDK -->
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=238503619633356";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



  
  <?php include_once("analyticstracking.php") ?>
<script src="http://code.jquery.com/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-22700949-2', 'tabarnakhiersoir.ca');
  ga('send', 'pageview');

</script>
<?php 

 ?>

<br/>

<!-- This is the bar at the top of the page -->
<br/>
<div class="navbar navbar-fixed-top navbar-inverse" style="background-color:red;">
<div class="navbar-inner"><a class="brand" href="index.php">tabarnakhiersoir.ca</a>
<ul class="nav">
<li class="active"><a href="index.php">Textes</a></li>
<li class="divider-vertical"></li>
<li><a href="popular.php">Populaires</a></li>
<li class="divider-vertical"></li>
<li><a href="submit.php">Soumettre</a></li>
<li class="divider-vertical"></li>
<li><a href="apropos.php">A Propos</a></li>
<li class="divider-vertical"></li>
</ul>
</div>
</div>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- coconut -->
<div style="display:inline-block; text-align:center; width:100%; height:90px;"><ins class="adsbygoogle"
     style="display:inline-block; width:90%; height:90px; text-align:center;"
     data-ad-client="ca-pub-4735696890523894"
     data-ad-slot="8124013683"></ins></div>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script> <br/>

<form action="recherche.php" method="post">
  <div class="input-append">
    <input type="text" class="span2" name="search" placeholder="Indicatif, mot" style="color:#A81B4A;">
    <button type="submit" class="btn">Rechercher</button>
  </div>
</form>

<!-- TWITTER WIDGET -->
<div style="position:fixed; right:170px;">
<a class="twitter-timeline" href="https://twitter.com/tbrnkhsr" data-widget-id="390703212073717760">Tweets by @tbrnkhsr</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>

<?php

$mysqli = new mysqli("localhost", "tabarnak_main", "Tabarnak!13", "tabarnak_main");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


$stmt1 = $mysqli->prepare("DELETE FROM textes_general WHERE text LIKE '%http%'");
$stmt1->execute(); 
$stmt1->close();

if ($stmt = $mysqli->prepare("SELECT text, area_code, id, downvotes, upvotes FROM textes_general ORDER BY id DESC")) {

    $stmt->execute();

    /* bind variables to prepared statement */

    $stmt->bind_result($texte, $area_code, $index, $dislikes,$likes);
 
    while ($stmt->fetch()) {

$texte =urldecode($texte);

       ?>

<!-- La boîte qui contient le texte -->
<div id="text-<?php printf("%s", $index); ?>" 
style="
display:block;
width: 480px;
margin-bottom:15px;
height:inherit;
 padding: 7px 15px 10px 15px; 
color: #A81B4A; 
background-color: #FCE6ED; 
vertical-align:middle; 
line-height: 25px; 
-webkit-border-radius: 8px;
-moz-border-radius: 8px;
border: 1px solid #F5AEC6;
border-radius: 8px;
margin-bottom: 15px;
margin-left: auto;
margin-right: auto;
"> 

<?php printf("(%d)",$area_code); ?> <br/><?php printf(" %s", stripslashes($texte)); ?><br/>


<div class="appreciation">
<a href="javascript:void(0);" id="l-<?php echo $index; ?>"> COCORICO! <span id="likes<?php echo(json_encode($index)); ?>"><?php echo $likes; ?></span>
</a>
</div>

<div class="appreciation">
<a href="javascript:void(0);" id="d-<?php echo $index; ?>">
AYOYE! <span id="dislikes<?php echo(json_encode($index)); ?>"><?php echo $dislikes; ?></span>
</a>
</div>

<script type="text/javascript">

$('#d-<?php echo(json_encode($index)); ?>').click(function(){

var myVariable = 0;

myVariable = <?php echo(json_encode($index)); ?>;

add_dislike(myVariable);

});

</script>

<script type="text/javascript">

$('#l-<?php echo(json_encode($index)); ?>').click(function(){

var myVariable = 0;

myVariable = <?php echo(json_encode($index)); ?>;

add_like(myVariable);

});

</script>

<!-- Bouton TWITTER -->
<div id="twitter-share" style="width: 300px; display:block; margin-top:5px;">
<a class="social" href="javascript:window.open('https://twitter.com/share?text=<?php printf(" %s...", utf8_encode(substr($texte, 0, 110)));?>&url=http://www.tabarnakhiersoir.ca/comments.php?q=<?php printf("%s", $index); ?>', 'Twitter Share', 'width=700, height=350')" data-lang="en" data-via="tbrnkhsr" 
style="
display:block;
float:right;
height:20px;
width:20px;
    background-size:20px 20px;
    background-image:url('img/twitterbirddarkbgs.png');
    background-color: #A81B4A;
    background-repeat:no-repeat;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
   " title="Poster le texte sur Twitter!" target="_blank" ></a>
   
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


<!-- Bouton FACEBOOK -->
<a class="social" class="click" style="
margin-right:5px;
float:right;
height:20px;
width:20px;
    background-size:20px 20px;
 background-image:url('img/fbicon.png');
 background-color: #A81B4A;
  background-repeat:no-repeat;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;" title="Partagez avec vos amis Facebook!"
  href="javascript:window.open('http://www.facebook.com/dialog/feed?app_id= 238503619633356&link=http://tabarnakhiersoir.ca/comments.php?q=<?php printf("%s", $index); ?>&display=popup&redirect_uri=http://tabarnakhiersoir.ca/comments.php?q=<?php printf("%s", $index); ?>', 'Twitter Share', 'width=700, height=350')" target="shit">
        </a>
        
<!-- Bouton REDDIT
<a style="display:block;
float:right;
margin-right:5px;
vertical-align: middle;
height:20px;
width:20px;
    background-size:20px 20px;
    background-color: #A81B4A;
    background-repeat:no-repeat;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
   " title="Partagez le texte sur reddit!" href="http://www.reddit.com/submit" onclick="window.location = 'http://www.reddit.com/submit?url=' + encodeURIComponent(window.location); return false" class="social"> <img style="vertical-align:middle;"  alt="submit to reddit" border="0" /> </a>
-->
</div>


<div style="padding-top:25px; display:block; font-size:0.8em;"><a class="comments" href="comments.php?q=<?php printf("%s", $index); ?>#disqus_thread"> commentaires </a></div>

   
</div>
<?php

    }

}

?>



<script type="text/javascript">// <![CDATA[
$(document).ready(function () {
        $('ul.nav > li').click(function (e) {
            $('ul.nav > li').removeClass('active');
            $(this).addClass('active');                
        });            
    });
// ]]></script>

<div style="display:inline-block; text-align:center; width:100%; height:90px;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- coconut -->
<ins class="adsbygoogle"
     style="display:inline-block;width:90%;height:90px"
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
     
    
    <script type="text/javascript">
/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
var disqus_shortname = 'tabarnakhiersoir'; // required: replace example with your forum shortname

/* * * DON'T EDIT BELOW THIS LINE * * */
(function () {
var s = document.createElement('script'); s.async = true;
s.type = 'text/javascript';
s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
}());
</script>

</body>
  
</html>