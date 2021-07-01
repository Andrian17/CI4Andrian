<?= $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Form Tambah Data Mahasiswa</h2>
            <form action="/C_mahasiswa/save" method="post" enctype="multipart/form-data">
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
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="foto">Pilih Foto</label>
                    <div class="col-sm-2">
                        <img src="/img/guest.png" class="img-thumbnail img-preview">
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
                </div>
                <button class="btn btn-primary" name="BtnSimpan" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>