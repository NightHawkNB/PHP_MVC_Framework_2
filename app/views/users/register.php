<?php $this->view('inc/components/header') ?>
<?php $this->view('inc/components/topnav') ?>

<main>

    <form method="post">

        <h2 style="text-align: center; padding-bottom: 20px">Registeration Page</h2>

        <div style="display: flex; width: 100%; justify-content: center">
            Already have an account ? <a href="<?= URL_ROOT ?>/users/login">Login</a>
        </div>

        <div>
            <div>
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname" value="<?= $data['fname'] ?>">
                <span class="form-invalid"><?= $data['name_err'] ?></span>
            </div>

            <div>
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" value="<?= $data['lname'] ?>">
                <span class="form-invalid"><?= $data['name_err'] ?></span>
            </div>
        </div>

        <label for="dob">Birthday</label>
        <input type="date" name="dob" id="dob">
        <span class="form-invalid"></span>

        <div>
            <div>
                <label for="city">City</label>
                <input type="text" name="city" id="city" value="<?= $data['city'] ?>">
                <span class="form-invalid"></span>
            </div>

            <div>
                <label for="country">Country</label>
                <input type="text" name="country" id="country" value="<?= $data['country'] ?>">
                <span class="form-invalid"></span>
            </div>
        </div>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= $data['email'] ?>">
        <span class="form-invalid"><?= $data['email_err'] ?></span>

        <div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <span class="form-invalid"><?= $data['password_err'] ?></span>
            </div>

            <div>
                <label for="c_password">Confirm Password</label>
                <input type="password" name="c_password" id="c_password">
                <span class="form-invalid"><?= $data['c_password_err'] ?></span>
            </div>
        </div>

        <div style="display: flex; width: 100%; justify-content: center">
            <button type="submit" class="submit-btn">Register</button>
        </div>
    </form>
</main>

<?php $this->view('inc/components/footer') ?>