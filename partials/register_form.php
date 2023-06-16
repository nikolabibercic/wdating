<form class="form container" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
    <?php if(isset($emailError)): ?>
        <p style="color:var(--danger); font-weight:600;">Email is required!</p>
    <?php endif; ?>
    <input type="email" name="email" placeholder="Email">
    <?php if(isset($usernameError)): ?>
        <p style="color:var(--danger); font-weight:600;">Username is required!</p>
    <?php endif; ?>
    <input type="text" name="username" placeholder="Username">
    <select name="gender" id="gender">
        <?php $genderList = $user->genderList(); foreach($genderList as $gender): ?>
            <option value="<?php echo $gender->gender_id; ?>"><?php echo $gender->gender; ?></option>
        <?php endforeach; ?>
    </select>
    <select name="country" id="country">
        <?php $countryList = $user->countryList(); foreach($countryList as $country): ?>
            <option value="<?php echo $country->country_id; ?>"><?php echo $country->country; ?></option>
        <?php endforeach; ?>
    </select>
    <?php if(isset($passwordError)): ?>
        <p style="color:var(--danger); font-weight:600;">Password is required!</p>
    <?php endif; ?>
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Create account</button>
</form>