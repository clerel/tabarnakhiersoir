<?php

session_start();

$q=$_GET["q"];

if(!in_array($q,$_SESSION['visited'])){
    array_push($_SESSION['visited'], $q);


$mysqli = new mysqli("localhost", "tabarnak_main", "Tabarnak!13", "tabarnak_main");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


if (!($stmt3 = $mysqli->prepare("INSERT INTO visiting_ip(ip) VALUES (?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$stmt3->bind_param("s", $_SESSION['id2'])) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!$stmt3->execute()) {
    echo "";
}




if ($stmt = $mysqli->prepare("SELECT downvotes FROM textes_general WHERE id = '".$q."'")) {

    $stmt->execute();

 $stmt->bind_result($downvote);
 
    while ($stmt->fetch()) {

      $downvotes = $downvote + 1;

      $_SESSION['tracker'] = 'guest'.$q;
echo $downvotes;
    }

}

if ($stmt1 = $mysqli->prepare("UPDATE textes_general SET downvotes = ? WHERE id = '".$q."'")) {

 $stmt1->bind_param('i', $downvotes);
 

    $stmt1->execute();    
}

$stmt->close();

$stmt1->close();
}


else{

$mysqli = new mysqli("localhost", "tabarnak_main", "Tabarnak!13", "tabarnak_main");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if ($stmt = $mysqli->prepare("SELECT downvotes FROM textes_general WHERE id = '".$q."'")) {

    $stmt->execute();

 $stmt->bind_result($downvote);
 
    while ($stmt->fetch()) {
echo $downvote;
    }

}

$stmt->close();

}



?>