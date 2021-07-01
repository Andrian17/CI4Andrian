<?= $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2><?= $tittle; ?></h2>
            <form action="/C_mahasiswa/edit/<?= $edit['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $edit['id']; ?>">
                <input type="hidden" name="fotoLama" value="<?= $edit['foto']; ?>">
                <div class="input-group mb-3">
                    <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                    <input type="text" class="form-control <?= $validation->hasError('nama') ? "is-invalid" : ""; ?>" name="nama" id="nama" value="<?= old('nama') ? old('nama') : $edit['nama']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                    <input type="text" class="form-control <?= $validation->hasError('alamat') ? "is-invalid" : ""; ?>" id="alamat" name="alamat" value="<?= old('alamat') ? old('alamat') : $edit['alamat']; ?>">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('alamat'); ?>
                    </div>
                </div>

                <div class="col-sm-2">
                    <img src="/img/<?= $edit['foto']; ?>" class="img-thumbnail img-preview">
                    <!-- imgg preview js -->
                </div>
                <div class="col-sm-8">
                    <div class="custom-file">
                        <input type="file" class="form-control <?= $validation->hasError('foto') ? "is-invalid" : ""; ?>" id="foto" name="foto" onchange="prevImage()">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('foto'); ?>
                        </div>
                    </div>
                    <label for="foto" class="custom-file-label"></label>
                </div>

                <button class="btn btn-primary" name="BtnSimpan" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>