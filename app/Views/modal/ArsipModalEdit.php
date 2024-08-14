<div class="form-group">
    <label class="control-label">Nama</label>
    <input type="text" class="form-control" name="nama" value="<?= $Arsip->nama ?>" />
    <input type="hidden" class="form-control" name="id" value="<?= $Arsip->id ?>" />
</div>

<div class="form-group">
    <label class="control-label">file</label>
    <input accept="application/pdf" type="file" class="form-control" name="file" />
</div>