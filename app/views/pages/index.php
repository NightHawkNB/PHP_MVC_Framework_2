<?php $this->view('inc/components/header') ?>
<?php $this->view('inc/components/topnav') ?>

    <main>

        <h1>Welcome <?= $_SESSION['name'] ?> </h1>

    </main>

<?php $this->view('inc/components/footer') ?>