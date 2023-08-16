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
    
    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
    }else{
        $passwordError = "Password is required";
        $errors = true;
    }
    
    if(!$errors){
        $user->login($email,$password);
    }    

}


?>

<?php require 'views/index.view.php'; ?>
