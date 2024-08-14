<div class="form-group">
    <label class="control-label">Tingkat Pendidikan</label>
    <select name="KdTingkatDidik" id="" class="form-control">
        <?php foreach ($tingkatdidik as $row) {
            $selected = $row->kdtingkatdidik == $pendidikan->KdTingkatDidik ? 'selected' : '';
            echo "<option " . $selected . " value='" . $row->kdtingkatdidik . "'>" . $row->tingkatpendidikan . "</option>";
        } ?>
    </select>
    <input type="hidden" name="id" value="<?= $pendidikan->id ?>">
</div>
<div class="form-group">
    <label class="control-label">Nama Sekolah</label>
    <input type="text" class="form-control" name="NamaSekolah" value="<?= $pendidikan->NamaSekolah ?>" />
</div>
<div class="form-group">
    <label class="control-label">Tempat Lulus</label>
    <input type="text" class="form-control" name="TempatLulus" value="<?= $pendidikan->TempatLulus ?>" />
</div>
<div class="form-group">
    <label class="control-label">Tahun Lulus</label>
    <input type="text" class="form-control" name="TahunLulus" value="<?= $pendidikan->TahunLulus ?>" />
</div>
<div class="form-group">
    <label class="control-label">No Ijazah</label>
    <input type="text" class="form-control" name="NoIjazah" value="<?= $pendidikan->NoIjazah ?>" />
</div>
<div class="form-group">
    <label class="control-label">file</label>
    <input accept="application/pdf" type="file" class="form-control" name="file" />
</div>
<div class="form-group">
    <label class="control-label">Keterangan</label>
    <input type="text" class="form-control" name="Keterangan" value="<?= $pendidikan->Keterangan ?>" />
</div>