<?php 

require 'init.php';
$title = 'wdating';

$user->returnLoggedUser();

?>

<?php

if($_SERVER['REQUEST_METHOD'] === "POST"){

    $errors = false;

    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    }else{
        $emailError = "Email is required";
        $errors = true;
    }

    if(isset($_POST['username']) && !empty($_POST['username'])){
        $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
    }else{
        $usernameError = "Username is required";
        $errors = true;
    }

    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
    }else{
        $passwordError = "Password is required";
        $errors = true;
    }

    if(isset($_POST['gender']) && !empty($_POST['gender'])){
        $genderId = filter_input(INPUT_POST,'gender',FILTER_SANITIZE_NUMBER_INT);
    }else{
        $genderError = "Gender is required";
        $errors = true;
    }

    if(isset($_POST['country']) && !empty($_POST['country'])){
        $countryId = filter_input(INPUT_POST,'gender',FILTER_SANITIZE_NUMBER_INT);
    }else{
        $countryError = "Country is required";
        $errors = true;
    }

    if(!$errors){
        $user->register($email,$username,$password,$genderId,$countryId);
    }    

}

?>

<?php require 'views/register.view.php'; ?>