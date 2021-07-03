<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Daftar Orang</h1>
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari disini" name="cari">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                </div>
            </form>
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $j = $myPage - 1; ?>
                    <?php $i = 1 + (6 * $j); ?>
                    <span><?= $m; ?></span>
                    <?php foreach ($orgList as $o) { ?>
                        <?php if (!$o['nama']) : ?>
                            <?= 'Data Tidak ditemukan'; ?>
                        <?php endif; ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $o['nama']; ?></td>
                            <td><?= $o['alamat']; ?></td>
                            <td><button class="btn btn-primary">
                                    Detail
                                </button></td>

                        </tr>

                    <?php } ?>


                </tbody>
            </table>
            <?= $pager->links('orang', 'Conf_orang_pagination') ?>
        </div>
    </div>
</div>

<?= $this->EndSection(); ?>