<div class="form-group">
    <label class="control-label">Tingkat Pelatihan</label>
    <select name="KdJenisPelatihan" id="" class="form-control" required>
        <?php foreach ($jenispelatihan as $row) {
            $selected = $row->KdJenisPelatihan == $Pelatihan->KdJenisPelatihan ? 'selected' : '';
            echo "<option " . $selected . " value='" . $row->KdJenisPelatihan . "'>" . $row->JenisPelatihan . "</option>";
        } ?>
    </select>
    <input type="hidden" name="id" value="<?= $Pelatihan->id ?>">
</div>
<div class="form-group">
    <label class="control-label">Nama Pelatihan</label>
    <input type="text" class="form-control" name="NamaPelatihan" value="<?= $Pelatihan->NamaPelatihan ?>" required />
</div>
<div class="form-group">
    <label class="control-label">Tempat Pelatihan</label>
    <input type="text" class="form-control" name="TempatPelatihan" value="<?= $Pelatihan->TempatPelatihan ?>" required />
</div>
<div class="form-group">
    <label class="control-label">Tgl Mulai</label>
    <input type="date" class="form-control" name="TglMulai" value="<?= $Pelatihan->TglMulai ?>" required />
</div>
<div class="form-group">
    <label class="control-label">Tgl Selesai</label>
    <input type="date" class="form-control" name="TglSelesai" value="<?= $Pelatihan->TglSelesai ?>" required />
</div>
<div class="form-group">
    <label class="control-label">Penyelenggara</label>
    <input type="text" class="form-control" name="Penyelenggara" value="<?= $Pelatihan->Penyelenggara ?>" required />
</div>
<div class="form-group">
    <label class="control-label">Keterangan</label>
    <input type="text" class="form-control" name="Keterangan" value="<?= $Pelatihan->Keterangan ?>" required />
</div>
<div>
    <label class="control-label">File</label>
    <input accept="application/pdf" type="file" class="form-control" name="file" />
</div>