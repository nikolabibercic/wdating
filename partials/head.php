<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<header>    
    <nav class="container">
        <a href="user_desh.php" id="logo"><span>w</span>dating</a>
        <div class="meni">
            <?php if(isset($_SESSION['userId'])): ?>
                <a href="#"><?php echo $_SESSION['username'] ?></a>
                <a href="controller/logout.php">Logout</a>
            <?php endif; ?>
        </div>        
    </nav>
</header>