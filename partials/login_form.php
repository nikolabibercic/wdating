<form class="loginForm container" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
    <?php if(isset($emailError)): ?>
        <p>Email is required!</p>
    <?php endif; ?>
    <input type="text" name="email" placeholder="Email">
    <?php if(isset($passwordError)): ?>
        <p>Password is required!</p>
    <?php endif; ?>
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Log in</button>
</form>