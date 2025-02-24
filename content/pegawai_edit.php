<?php
if(!defined("INDEX")) die("");


$id = $_GET['id'];
$query = "SELECT * FROM pegawai WHERE id_pegawai = '$id'";
$result = mysqli_query($con,$query);
$data = mysqli_fetch_assoc($result);
?>

<div class="container mt-4 mb-5">
    <div class="card">
        <h4 class="card-header">Edit Pegawai</h4>
        <div class="card-body">
            <form action="?hal=pegawai_update" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$data['id_pegawai']?>">

                <div class="form-group mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="foto" id="foto" aria-describedby="uploadFoto">
                        <label class="input-group-text" for="foto" id="uploadFoto">Upload</label>
                        <?php if (!empty($data['foto'])): ?>
                        <img src="images/<?=$data['foto']?>" width="100" alt="Foto Pegawai" class="ms-2">
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama Pegawai</label>
                    <input type="text" name="nama" id="nama" class="form-control"
                        value="<?= htmlspecialchars($data['nama_pegawai'])?>" required>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="jk" id="laki" value="L"
                            <?= ($data['jenis_kelamin'] == "L") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="laki">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="jk" id="perempuan" value="P"
                            <?= ($data['jenis_kelamin'] == "P") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="tanggal" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?=$data['tgl_lahir']?>"
                        required>
                </div>

                <div class="form-group mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-select">
                        <option value="">Pilih Jabatan</option>
                        <?php 
                        $queryj = "SELECT * FROM jabatan";
                        $resultj = mysqli_query($con, $queryj);
                        while ($j = mysqli_fetch_assoc($resultj)) {
                            echo "<option value='$j[id_jabatan]'";
                            if ($j['id_jabatan'] == $data['id_jabatan']) echo " selected"; 
                            echo "> $j[nama_jabatan] </option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control"
                        rows="5"><?=$data['keterangan']?></textarea>
                </div>

                <!-- Tombol Aksi -->
                <div class="form-group row">
                    <div class="col-sm-12">
                        <a href="?hal=pegawai" class='btn btn-danger me-2'><i class='bi bi-arrow-left'></i> Batal</a>
                        <button type='reset' class='btn btn-warning me-2'><i class='bi bi-arrow-counterclockwise'></i>
                            Reset</button>
                        <button type='submit' class='btn btn-success'><i class='bi bi-save'></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>