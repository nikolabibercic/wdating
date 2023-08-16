<?php

require '../init.php';

$search = $_GET["search"]; 
$country = $_GET["country"]; 

$users = $user->getUsers($search,$country);

foreach($users as $user){
    echo "<p>".$user->username."</p>";
}

?>
