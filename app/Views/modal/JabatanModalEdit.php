<div class="form-group">
    <label class="control-label">Kode</label>
    <input type="text" class="form-control" name="KdJabatan" value="<?= $Jabatan->KdJabatan ?>" />
    <input type="hidden" class="form-control" name="id" value="<?= $Jabatan->id ?>" />
</div>
<div class="form-group">
    <label class="control-label">Kode 2</label>
    <input type="text" class="form-control" name="KdJabatan2" value="<?= $Jabatan->KdJabatan2 ?>" />
</div>
<div class="form-group">
    <label class="control-label">Nama Jabatan</label>
    <input type="text" class="form-control" name="NamaJabatan2" value="<?= $Jabatan->NamaJabatan2 ?>" />
</div>
<div class="form-group">
    <label class="control-label">Kode Bagian</label>
    <input type="text" class="form-control" name="KdBagian" value="<?= $Jabatan->KdBagian ?>" />
</div>
<div class="form-group">
    <label class="control-label">Kode Seksi</label>
    <input type="text" class="form-control" name="KdSeksi" value="<?= $Jabatan->KdSeksi ?>" />
</div>
<div class="form-group">
    <label class="control-label">Level</label>
    <select class="form-control" name="LevelA" id="">
        <option <?= $Jabatan->LevelA == 1 ? 'selected' : '' ?> value="1">1</option>
        <option <?= $Jabatan->LevelA == 2 ? 'selected' : '' ?> value="2">2</option>
        <option <?= $Jabatan->LevelA == 3 ? 'selected' : '' ?> value="3">3</option>
        <option <?= $Jabatan->LevelA == 4 ? 'selected' : '' ?> value="4">4</option>
        <option <?= $Jabatan->LevelA == 5 ? 'selected' : '' ?> value="5">5</option>
        <option <?= $Jabatan->LevelA == 6 ? 'selected' : '' ?> value="6">6</option>
        <option <?= $Jabatan->LevelA == 7 ? 'selected' : '' ?> value="7">7</option>
    </select>
</div>