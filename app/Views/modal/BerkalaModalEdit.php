<div class="form-group">
    <label class="control-label">No ID Kepangkatan</label>
    <input type="text" class="form-control" name="NoIDKepangkatan" value="<?= $Berkala->NoIDKepangkatan ?>" />
    <input type="hidden" class="form-control" name="id" value="<?= $Berkala->id ?>" />
</div>
<div class="form-group">
    <label class="control-label">Jenis Kenaikan Pangkat</label>
    <select class="form-control" name="KdKenaikanPangkat" id="" required>
        <?php
        foreach ($KenaikanPangkat as $row) {
            $selected = $row->KdKenaikanPangkat == $Berkala->KdKenaikanPangkat ? 'selected' : '';
            echo "<option " . $selected . " value='" . $row->KdKenaikanPangkat . "'>" . $row->KenaikanPangkat . "</option>";
        }
        ?>
    </select>
</div>
<div class="form-group">
    <label class="control-label">Kode Golongan</label>
    <select class="form-control" name="KdGolBaru" id="" required>
        <?php
        foreach ($Golongan as $row) {
            $selected = $row->kdgol == $Berkala->KdGolBaru ? 'selected' : '';
            echo "<option " . $selected . " value='" . $row->kdgol . "'>" . $row->kdgol . " - " . $row->pangkat . "</option>";
        }
        ?>
    </select>
</div>
<div class="form-group">
    <label class="control-label">Nomor SK</label>
    <input type="text" class="form-control" name="NoSKBaru" value="<?= $Berkala->NoSKBaru ?>" required />
</div>
<div class="form-group">
    <label class="control-label">Tanggal SK</label>
    <input type="date" class="form-control" name="TglSKBaru" value="<?= $Berkala->TglSKBaru ?>" required />
</div>
<div class="form-group">
    <label class="control-label">TMT</label>
    <input type="date" class="form-control" name="TMTBaru" value="<?= $Berkala->TMTBaru ?>" required />
</div>
<div class="form-group">
    <label class="control-label">Keterangan</label>
    <input type="text" class="form-control" name="Keterangan" value="<?= $Berkala->Keterangan ?>" required />
</div>