<?php 

require 'init.php';
$title = 'wdating';

?>

<?php 

if($_SERVER['REQUEST_METHOD']=== "POST"){

    $errors = false;

    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
    }else{
        $emailError = "Email is required";
        $errors = true;
    }
    
    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = $_POST['password'];
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
