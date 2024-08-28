<div class="form-group">
    <label class="control-label">Nama</label>
    <input type="text" class="form-control" name="Nama" value="<?= $keluarga->Nama ?>" />
    <input type="hidden" class="form-control" name="id_keluarga" value="<?= $keluarga->id_keluarga ?>" />
</div>

<div class="form-group">
    <label class="control-label">KK</label>
    <input type="text" class="form-control" name="NoKeluarga" value="<?= $keluarga->NoKeluarga ?>" />
</div>
<div class="form-group">
    <label class="control-label">Tempat Lahir</label>
    <input type="text" class="form-control" name="TempatLahir" value="<?= $keluarga->TempatLahir ?>" />
</div>
<div class="form-group">
    <label class="control-label">Tgl Lahir</label>
    <input type="date" class="form-control" name="TglLahir" value="<?= date('Y-m-d', strtotime($keluarga->TglLahir)) ?>" />
</div>
<div class="form-group">
    <label class="control-label">Hubungan</label>
    <select class="form-control" name="KdStatusKeluarga" id="" required>
        <option value="">-Pilih Hubungan-</option>
        <?php foreach ($statuskeluarga as $row) {
            $selected = $row->kdstatuskeluarga == $keluarga->KdStatusKeluarga ? 'selected' : '';
            echo "<option " . $selected . " value='" . $row->kdstatuskeluarga . "'>" . $row->statuskeluarga . "</option>";
        } ?>
    </select>
</div>
<div class="form-group">
    <label class="control-label">Jenis Kelamin</label>
    <select class="form-control" name="KdKelamin" id="" required>
        <option value="">-Pilih Jenis Kelamin-</option>
        <option <?= $keluarga->KdKelamin == 'L' ? 'selected' : ''  ?> value="L">Laki - Laki</option>
        <option <?= $keluarga->KdKelamin == 'P' ? 'selected' : ''  ?> value="P">Peremepuan</option>
    </select>
</div>
<div class="form-group">
    <label class="control-label">Tingkat Pendidikan</label>
    <select class="form-control" name="KdTingkatDidik" id="" required>
        <option value="">-Pilih Tingak Pendidikan-</option>
        <?php foreach ($tingkatdidik as $row) {
            $selected = $row->kdtingkatdidik == $keluarga->KdTingkatDidik ? 'selected' : '';
            echo "<option " . $selected . "  value='" . $row->kdtingkatdidik . "'>" . $row->tingkatpendidikan . "</option>";
        } ?>
    </select>
</div>
<div class="form-group">
    <label class="control-label">Pekerjaan</label>
    <select class="form-control" name="KdPekerjaan" id="" required>
        <option value="">-Pilih Pekerjaan-</option>
        <?php foreach ($pekerjaan as $row) {
            $selected = $row->kdpekerjaan == $keluarga->KdPekerjaan ? 'selected' : '';
            echo "<option " . $selected . " value='" . $row->kdpekerjaan . "'>" . $row->pekerjaan . "</option>";
        } ?>
    </select>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <input type="checkbox" value="1" name="DptAskes" <?= $keluarga->DptAskes == 1 ? 'checked' : ''  ?>>
            <label for="">Dapat Askes</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="checkbox" value="1" name="DptAsuransiBerobat" <?= $keluarga->DptAsuransiBerobat == 1 ? 'checked' : ''  ?>>
            <label for="">Asuransi Berobat</label>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label">Keterangan</label>
    <input type="text" class="form-control" name="Keterangan" value="<?= $keluarga->Keterangan  ?>" />
</div>