<div class="form-group">
    <label class="control-label">Nama</label>
    <input type="text" class="form-control" name="Nama" value="<?= $pasangan->Nama ?>" />
    <input type="hidden" class="form-control" name="id_keluarga" value="<?= $pasangan->id_keluarga ?>" />
</div>

<div class="form-group">
    <label class="control-label">KK</label>
    <input type="text" class="form-control" name="NoKeluarga" value="<?= $pasangan->NoKeluarga ?>" />
</div>
<div class="form-group">
    <label class="control-label">Tempat Lahir</label>
    <input type="text" class="form-control" name="TempatLahir" value="<?= $pasangan->TempatLahir ?>" />
</div>
<div class="form-group">
    <label class="control-label">Tgl Lahir</label>
    <input type="date" class="form-control" name="TglLahir" value="<?= date('Y-m-d', strtotime($pasangan->TglLahir)) ?>" />
</div>
<div class="form-group">
    <label class="control-label">Hubungan</label>
    <select class="form-control" name="KdStatusKeluarga" id="" required>
        <option value="">-Pilih Hubungan-</option>
        <?php foreach ($statuskeluarga as $row) {
            $selected = $row->kdstatuskeluarga == $pasangan->KdStatusKeluarga ? 'selected' : '';
            echo "<option " . $selected . " value='" . $row->kdstatuskeluarga . "'>" . $row->statuskeluarga . "</option>";
        } ?>
    </select>
</div>