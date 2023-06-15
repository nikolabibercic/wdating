<form class="form container" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
    <?php if(isset($emailError)): ?>
        <p style="color:var(--danger); font-weight:600;">Email is required!</p>
    <?php endif; ?>
    <input type="text" name="email" placeholder="Email">
    <?php if(isset($passwordError)): ?>
        <p style="color:var(--danger); font-weight:600;">Password is required!</p>
    <?php endif; ?>
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Log in</button>
    <p>Don't have account? <a href="register.php">Create account here.</a></p>
</form>

