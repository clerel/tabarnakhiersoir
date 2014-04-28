<!-- Connecting to the database using info from selected message -->

<?php
$q=$_GET["q"];

$mysqli = new mysqli("localhost", "tabarnak_main", "Tabarnak!13", "tabarnak_main");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if ($stmt = $mysqli->prepare("SELECT text, area_code, id, downvotes, upvotes FROM textes_general WHERE id = '".$q."'")) {

    $stmt->execute();

  $stmt->bind_result($texte, $area_code, $index, $dislikes,$likes);

 
    while ($stmt->fetch()) {
$texte =urldecode($texte);
$texte =stripslashes($texte);

    ?>


<!--Official beginning of the page -->

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">
  <head profile="http://www.w3.org/2005/10/profile">
<link rel="icon" 
      type="image/png" 
      href="http://tabarnakhiersoir.ca/img/flagship.png">
    <title><?php echo $texte; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:image" content="http://tabarnakhiersoir.ca/img/flagship.png"/>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/custom.css" rel="stylesheet">
   
   
   <!-- Javascript to handle likes AND dislikes --> 
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
a.social:hover
{
background-color:#FCDA90; 
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

a.appreciation:hover
{background-color:red;
}
</style>


  </head>

<!-- Official body begins here -->

<body>

<?php include_once("analyticstracking.php") ?>

<!-- Include necessary javascript folders -->
<script src="http://code.jquery.com/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

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
</ul>
</div>
</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-22700949-2', 'tabarnakhiersoir.ca');
  ga('send', 'pageview');

</script>


<!-- La boîte qui contient le texte -->
<div id="text-<?php printf("%s", $index); ?>" 
style="
display:block;
width: 480px;
margin-bottom:15px;
height:inherit;
 padding: 7px 15px 35px 15px; 
color: #A81B4A; 
background-color: #FCE6ED; 
vertical-align:middle; 
line-height: 25px; 
-webkit-border-radius: 8px;
-moz-border-radius: 8px;
border: 1px solid #F5AEC6;
border-radius: 8px;"> 

<!--Indicatif et texte -->
<?php printf("(%d)",$area_code); ?> <br/><?php printf(" %s", $texte); ?><br/>

<!-- Boutons Tabarnak et Tiguidou -->
<div class="appreciation">
<a href="javascript:void(0);" id="l-<?php echo $index; ?>"> 
TIGUIDOU <span id="likes<?php echo(json_encode($index)); ?>"><?php echo $likes; ?></span>
</a>
</div>

<div class="appreciation">
<a href="javascript:void(0);" id="d-<?php echo $index; ?>">
TABARNAK <span id="dislikes<?php echo(json_encode($index)); ?>"><?php echo $dislikes; ?></span>
</a>
</div>

<!-- Javascript pour gérer les likes et dislikes -->
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
<a class="social" href="javascript:window.open('https://twitter.com/share?text=<?php printf(" %s...", substr(urlencode($texte), 0, 110));?>', 'Twitter Share', 'width=700, height=350')" data-lang="en"  
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
   " title="Poster le texte sur Twitter!"></a>
   
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
  href="javascript:window.open('http://www.facebook.com/dialog/feed?app_id= 238503619633356&link=http://tabarnakhiersoir.ca/comments.php?q=<?php printf("%s", $index); ?>&display=popup&redirect_uri=http://tabarnakhiersoir.ca/comments.php?q=<?php printf("%s", $index); ?>', 'Facebook Share', 'width=700, height=350')" target="shit">
        </a>

        
<!-- Bouton REDDIT
<a style="display:block;
float:right;
margin-right:5px;
vertical-align: middle;
height:20px;
width:20px;
    background-size:20px 20px;
    /* background-image:url('img/twitterbirddarkbgs.png'); */
    background-color: #A81B4A;
    background-repeat:no-repeat;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
   " title="Partagez le texte sur reddit!" href="http://www.reddit.com/submit" onclick="window.location = 'http://www.reddit.com/submit?url=' + encodeURIComponent(window.location); return false" class="social"> <img style="vertical-align:middle;" src="img/reddit_alien.png" alt="submit to reddit" border="0" /> </a>

-->
</div>
 
</div>


  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- coconut -->
<div style="display:inline-block; text-align:center; width:100%; height:90px;"><ins class="adsbygoogle"
     style="display:inline-block; text-align:center; width: 75%; height:90px;"
     data-ad-client="ca-pub-4735696890523894"
     data-ad-slot="8124013683"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>


<!-- Commentaires DISQUS -->
<div 
style="width: 500px;
color:rgb(87,10,37); " id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'tabarnakhiersoir'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    



<?php
    }

}



$stmt->close();



?>



</body>

</html>