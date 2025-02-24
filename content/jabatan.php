<?php
if (!defined("INDEX")) die("");
?>

<h4 class="mt-2">Data Jabatan</h4>
<hr>
<a class="btn btn-success mb-3" href="?hal=jabatan_tambah">
    <i class="bi bi-plus"></i>Tambah</a>

<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $query = "SELECT * FROM jabatan ORDER BY id_jabatan DESC";
        $result = mysqli_query($con, $query);
        $no = 0;
        while ($data = mysqli_fetch_array($result)) {
            $no++;
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $data['nama_jabatan'] ?></td>
                <td>
                    <a href="?hal=jabatan_edit&id=<?= $data['id_jabatan'] ?>" class="btn btn-sm btn-warning">
                        Edit</a>
                    <a href="?hal=jabatan_hapus&id=<?= $data['id_jabatan'] ?>" class="btn btn-sm btn-danger">
                        Hapus</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>