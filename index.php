<?php 

require 'init.php';
$title = 'wdating';

?>

<?php 

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo $email;
    echo $password;
}

?>

<?php require 'views/index.view.php'; ?>
