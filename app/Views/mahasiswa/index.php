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
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($mhsList as $m) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><img src="/img/<?= $m['foto']; ?>" alt="" class="sampul"></td>
                            <td><?= $m['nama']; ?></td>
                            <td><?= $m['alamat']; ?></td>
                            <td><a href="C_mahasiswa/detail/<?= $m['id']; ?>" class="btn btn-info">Deatil</a></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>