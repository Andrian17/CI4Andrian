<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2"><?= $tittle; ?></h2>
            <?php if (session()->getFlashdata('e')) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= session()->getFlashdata('e'); ?>
                </div>
            <?php endif; ?>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $detail['foto']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><b>Nama :</b><?= $detail['nama']; ?></h5>
                            <p class="card-text"><b>Alamat :</b><?= $detail['alamat']; ?></p>
                            <p class="card-text"><small class="text-muted">Terakhir Diubah <?= $detail['updated_at']; ?></small></p>
                            <a href="/C_mahasiswa/formEdit/<?= $detail['id']; ?>" class="btn btn-primary">Edit</a>
                            <form action="<?= $detail['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                            <br><br>
                            <a href="/C_mahasiswa">Kembali ke HOME</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php echo $this->endSection() ?>; ?>