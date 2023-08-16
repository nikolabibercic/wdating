<?php require 'partials/head.php'; ?>

<main class="container">
    <?php if($user->isAdmin()): ?>
        <b>ADMIN </b><?php echo $_SESSION['username']; ?>
    <?php else: ?>
        <?php echo $_SESSION['username']; ?>
    <?php endif; ?>

    <?php require 'partials/search_form.php'; ?>

    <div id="userContainer"></div>
</main>

<?php require 'partials/bottom.php'; ?>