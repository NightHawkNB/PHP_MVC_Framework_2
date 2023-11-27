<?php $this->view('inc/components/header') ?>
<?php $this->view('inc/components/topnav') ?>

    <main>

        <form method="post">

            <h2 style="text-align: center; padding-bottom: 20px">User Login</h2>

            <div style="display: flex; width: 100%; justify-content: center">
                Don't have an account ? <a href="<?= URL_ROOT ?>/users/register">Register</a>
            </div>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $data['email'] ?>">
            <span class="form-invalid"><?= $data['email_err'] ?></span>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="<?= $data['password'] ?>">
            <span class="form-invalid"><?= $data['password_err'] ?></span>

            <div style="display: flex; width: 100%; justify-content: center">
                <button type="submit" class="submit-btn">Login</button>
            </div>
        </form>

    </main>

<?php $this->view('inc/components/footer') ?>