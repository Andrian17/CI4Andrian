<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Daftar Mahasiswa</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td><img src="/img/siswa1.jpg" alt="" class="sampul"></td>
                        <td>Otto</td>
                        <td><a class="btn btn-success" href=" "> Detail </a></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>