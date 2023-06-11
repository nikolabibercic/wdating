<?php require 'partials/head.php'; ?>

<?php if($user->isAdmin()): ?>
    <b>ADMIN </b><?php echo $_SESSION['username']; ?>
<?php else: ?>
    <?php echo $_SESSION['username']; ?>
<?php endif; ?>

<?php require 'partials/bottom.php'; ?>