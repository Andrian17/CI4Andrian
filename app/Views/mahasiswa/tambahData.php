<?= $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Form Tambah Data Mahasiswa</h2>
            <form action="/C_mahasiswa/save" method="post">
                <?= csrf_field(); ?>
                <div class="input-group mb-3">
                    <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                    <input type="text" class="form-control <?= $validation->hasError('nama') ? "is-invalid" : ""; ?>" name="nama" id="nama" value="<?= old('nama'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                    <input type="text" class="form-control <?= $validation->hasError('alamat') ? "is-invalid" : ""; ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('alamat'); ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-sm-2 col-form-label" for="foto">Foto</label>
                    <input type="text" class="form-control" id="foto" name="foto">
                </div>
                <button class="btn btn-primary" name="BtnSimpan" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>