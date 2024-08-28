<div class="form-group">
    <label class="control-label">Nomor Jabatan</label>
    <input type="text" class="form-control" name="NoJabatan" value="<?= $TrJabatan->NoJabatan ?>" required />
    <input type="hidden" class="form-control" name="id" value="<?= $TrJabatan->id ?>" required />
</div>
<div class="form-group">
    <label class="control-label">Nomor SK</label>
    <input type="text" class="form-control" name="NoSK" value="<?= $TrJabatan->NoSK ?>" required />
</div>
<div class="form-group">
    <label class="control-label">Tanggal SK</label>
    <input type="date" class="form-control" name="TglSK" value="<?= $TrJabatan->TglSK ?>" required />
</div>
<div class="form-group">
    <label class="control-label">TMT</label>
    <input type="date" class="form-control" name="TMT" value="<?= $TrJabatan->TMT ?>" required />
</div>
<div class="form-group">
    <label class="control-label">Jabatan Baru</label>
    <select class="form-control" name="KdJabatanBaru">
        <?php
        foreach ($jabatan as $row) {
            echo "<option value='" . $row->id . "'>" . $row->NamaJabatan2 . "</option>";
        }
        ?>
    </select>
</div>
<div class="form-group">
    <label class="control-label">File</label>
    <input accept=".pdf" id="file-input" type="file" class="form-control" name="file" />
</div>
<div class="form-group">
    <label class="control-label">Keterangan</label>
    <input type="text" class="form-control" name="Keterangan" value="<?= $TrJabatan->Keterangan ?>" required />
</div>