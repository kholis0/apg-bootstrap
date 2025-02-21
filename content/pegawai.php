<?php
if (!defined("INDEX")) die("");
?>

<h2 class="judul">Data pegawai</h2>
<a href="?hal=pegawai_tambah" class="tombol">Tambah</a>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>pegawai</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM pegawai ";
        $query .= "LEFT JOIN jabatan ";
        $query .= "ON pegawai.id_pegawai = jabatan.id_jabatan ";
        $query .= "ORDER BY pegawai.id_pegawai DESC";
        $result = mysqli_query($con, $query);
        $no = 0;
        
        while ($data = mysqli_fetch_assoc($result)) {
            $no++;
        ?>
        <tr>
            <td><?= $no ?></td>
            <td>
                <?php 
                if (isset($data['foto'])) {
                    ?>
                <img src="images/<?=$data['foto']?>" width="100">
                <?php
                }
                ?>

            </td>
            <td><?= $data['nama_pegawai'] ?></td>
            <td><?= $data['jenis_kelamin'] ?></td>
            <td><?= $data['tgl_lahir'] ?></td>
            <td><?= $data['nama_jabatan'] ?></td>
            <td><?= $data['keterangan'] ?></td>
            <td>
                <a href=" ?hal=pegawai_edit&id=<?= $data['id_pegawai'] ?>" class="tombol edit"> Edit</a>
                <a href="?hal=pegawai_hapus&id=<?= $data['id_pegawai'] ?>&foto=<?$data['foto']?>" class="tombol hapus">
                    Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>