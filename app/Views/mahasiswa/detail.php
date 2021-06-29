<?= $this->extend('layout/template'); ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2"><?= $tittle; ?></h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $detail['foto']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><b>Nama :</b><?= $detail['nama']; ?></h5>
                            <p class="card-text"><b>Alamat :</b><?= $detail['alamat']; ?></p>
                            <p class="card-text"><small class="text-muted">Terakhir Diubah <?= $detail['created_at']; ?></small></p>
                            <a href="/C_Mahsiswa/hapus/<?= $detail['id']; ?>" class="btn btn-info">Detail</a>
                            <a href="/C_mahasiswa/hapus/<?= $detail['id']; ?>" class="btn btn-danger">Hapus</a>
                            <br><br>
                            <a href="/C_mahasiswa">Kembali ke HOME</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $this->endSection() ?>; ?>