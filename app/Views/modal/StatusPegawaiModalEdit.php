<div class="form-group">
    <label class="control-label">Kode</label>
    <input type="text" class="form-control" name="KdStatusPegawai" value="<?= $StatusPegawai->KdStatusPegawai ?>" />
    <input type="hidden" class="form-control" name="id" value="<?= $StatusPegawai->id ?>" />
</div>
<div class="form-group">
    <label class="control-label">Status Pegawai</label>
    <input type="text" class="form-control" name="StatusPegawai" value="<?= $StatusPegawai->StatusPegawai ?>" />
</div>
<div class="form-group">
    <label class="control-label">Buat Gaji</label>
    <input type="number" class="form-control" name="BuatGaji" value="<?= $StatusPegawai->BuatGaji ?>" />
</div>
<div class="form-group">
    <label class="control-label">Persentase</label>
    <input type="number" class="form-control" name="Persentase" value="<?= $StatusPegawai->Persentase ?>" />
</div>