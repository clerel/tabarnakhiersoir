<?php 

session_start();

$q=$_GET["q"];

if(!in_array($q,$_SESSION['visited2'])){
    array_push($_SESSION['visited2'], $q);

$mysqli = new mysqli("tabarnakhiersoir.db.9179378.hostedresource.com", "tabarnakhiersoir", "Tabarnak!13", "tabarnakhiersoir");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if ($stmt = $mysqli->prepare("SELECT upvotes FROM textes_general WHERE id = '".$q."'")) {

    $stmt->execute();

 $stmt->bind_result($upvote);
 
    while ($stmt->fetch()) {

      $upvotes = $upvote + 1;
echo $upvotes;

    }

}

if ($stmt1 = $mysqli->prepare("UPDATE textes_general SET upvotes = ? WHERE id = '".$q."'")) {

 $stmt1->bind_param('i', $upvotes);
 
    $stmt1->execute();    
}

$stmt->close();

$stmt1->close();

}

else{

$mysqli = new mysqli("tabarnakhiersoir.db.9179378.hostedresource.com", "tabarnakhiersoir", "Tabarnak!13", "tabarnakhiersoir");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if ($stmt = $mysqli->prepare("SELECT upvotes FROM textes_general WHERE id = '".$q."'")) {
    $stmt->execute();
 $stmt->bind_result($upvote);
    while ($stmt->fetch()) {
echo $upvote;
    }
}

$stmt->close();

}

?>