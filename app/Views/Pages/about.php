<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>About Me</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, doloremque? Sed, nesciunt vel ullam non perspiciatis, recusandae, asperiores mollitia blanditiis accusamus molestiae reprehenderit quisquam corporis minus quaerat fugiat quia magnam.</p>

            <?php foreach ($Me as $aku) : ?>
                <ul>
                    <li><?= $aku['Nama']; ?></li>
                    <li><?= $aku['Alamat']; ?></li>
                    <hr>
                </ul>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<?php echo $this->endSection() ?> ?>