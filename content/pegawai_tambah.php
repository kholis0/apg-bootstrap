<?php
if(!defined("INDEX")) die("");
?>

<div class="container mt-4">
    <h4>Tambah Pegawai</h4>
    <hr>
    <form action="?hal=pegawai_insert" method="post" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <div class="form-check">
                <input type="radio" name="jk" id="jk-laki" value="L" class="form-check-input">
                <label class="form-check-label" for="jk-laki">Laki-laki</label>
            </div>
            <div class="form-check">
                <input type="radio" name="jk" id="jk-perempuan" value="P" class="form-check-input">
                <label class="form-check-label" for="jk-perempuan">Perempuan</label>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="tanggal" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select name="jabatan" id="jabatan" class="form-select" required>
                <option value="">Pilih Jabatan</option>
                <?php 
                $query = "SELECT * FROM jabatan";
                $result = mysqli_query($con, $query);
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "<option value='$data[id_jabatan]'>$data[nama_jabatan]</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="5"></textarea>
        </div>

        <div class="form-group row mb-5">
            <div class="col-sm-12">
                <a href="?hal=pegawai" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Batal</a>
                <button type="reset" class="btn btn-warning ms-2"><i class="bi bi-arrow-counterclockwise"></i>
                    Reset</button>
                <button type="submit" class="btn btn-success ms-2"><i class="bi bi-save"></i> Simpan</button>
            </div>
        </div>
    </form>
</div>